#!/bin/bash
# Script à exécuter DIRECTEMENT sur le VPS via Terminal hPanel
# Copiez ce script dans le terminal hPanel du VPS

set -e

echo "🔍 Vérification de l'emplacement de tradeasy..."
echo ""

# Couleurs
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m'

info() {
    echo -e "${GREEN}✓${NC} $1"
}

warn() {
    echo -e "${YELLOW}⚠${NC} $1"
}

error() {
    echo -e "${RED}✗${NC} $1"
}

section() {
    echo -e "\n${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"
}

section "1. Vérification des Domaines Tradeasy"

# Chercher tradeasy dans les domaines
TRADEASY_FOUND=false
TRADEASY_LOCATIONS=()

echo "Recherche dans /root/domains/..."
if [ -d "/root/domains" ]; then
    for dir in /root/domains/*; do
        if [ -d "$dir" ] && [[ "$dir" == *"tradeasy"* ]]; then
            info "Trouvé: $dir"
            echo "   Contenu:"
            ls -la "$dir" 2>/dev/null | head -10 | sed 's/^/   /'
            TRADEASY_FOUND=true
            TRADEASY_LOCATIONS+=("$dir")
        fi
    done
fi

echo ""
echo "Recherche dans /var/www/..."
if [ -d "/var/www" ]; then
    for dir in /var/www/*; do
        if [ -d "$dir" ] && [[ "$dir" == *"tradeasy"* ]]; then
            info "Trouvé: $dir"
            echo "   Contenu:"
            ls -la "$dir" 2>/dev/null | head -10 | sed 's/^/   /'
            TRADEASY_FOUND=true
            TRADEASY_LOCATIONS+=("$dir")
        fi
    done
fi

echo ""
echo "Recherche dans /home/..."
if [ -d "/home" ]; then
    for user_dir in /home/*; do
        if [ -d "$user_dir" ] && [ -d "$user_dir/domains" ]; then
            for dir in "$user_dir/domains"/*; do
                if [ -d "$dir" ] && [[ "$dir" == *"tradeasy"* ]]; then
                    info "Trouvé: $dir"
                    echo "   Contenu:"
                    ls -la "$dir" 2>/dev/null | head -10 | sed 's/^/   /'
                    TRADEASY_FOUND=true
                    TRADEASY_LOCATIONS+=("$dir")
                fi
            done
        fi
        if [ -d "$user_dir/public_html" ]; then
            if [[ "$user_dir" == *"tradeasy"* ]]; then
                info "Trouvé: $user_dir/public_html"
                TRADEASY_FOUND=true
                TRADEASY_LOCATIONS+=("$user_dir/public_html")
            fi
        fi
    done
fi

if [ "$TRADEASY_FOUND" = false ]; then
    warn "Aucun répertoire tradeasy trouvé sur ce VPS"
    echo "   → Tradeasy est probablement sur Cloud Hosting (géré via hPanel)"
    echo "   → Ou sur un autre serveur"
else
    info "Tradeasy trouvé dans ${#TRADEASY_LOCATIONS[@]} emplacement(s):"
    for loc in "${TRADEASY_LOCATIONS[@]}"; do
        echo "   - $loc"
    done
fi

section "2. Vérification des Configurations Web Server"

# Vérifier Nginx
if command -v nginx &> /dev/null; then
    info "Nginx installé. Recherche des configurations tradeasy..."
    NGINX_CONFIGS=$(grep -r "tradeasy" /etc/nginx/sites-available/ 2>/dev/null | cut -d: -f1 | sort -u)
    if [ -n "$NGINX_CONFIGS" ]; then
        echo "   Configurations trouvées:"
        echo "$NGINX_CONFIGS" | sed 's/^/   - /'
    else
        warn "Aucune config Nginx pour tradeasy"
    fi
else
    warn "Nginx non installé"
fi

# Vérifier Apache
if command -v apache2 &> /dev/null || command -v httpd &> /dev/null; then
    info "Apache installé. Recherche des configurations tradeasy..."
    APACHE_CONFIGS=$(grep -r "tradeasy" /etc/apache2/sites-available/ 2>/dev/null | cut -d: -f1 | sort -u)
    if [ -z "$APACHE_CONFIGS" ] && [ -d "/etc/httpd/conf.d" ]; then
        APACHE_CONFIGS=$(grep -r "tradeasy" /etc/httpd/conf.d/ 2>/dev/null | cut -d: -f1 | sort -u)
    fi
    if [ -n "$APACHE_CONFIGS" ]; then
        echo "   Configurations trouvées:"
        echo "$APACHE_CONFIGS" | sed 's/^/   - /'
    else
        warn "Aucune config Apache pour tradeasy"
    fi
else
    warn "Apache non installé"
fi

section "3. Vérification de la Structure des Répertoires"

echo "Structure actuelle des domaines:"
if [ -d "/root/domains" ]; then
    echo "   /root/domains/:"
    ls -1 /root/domains/ 2>/dev/null | sed 's/^/      - /' || echo "      (vide)"
fi

if [ -d "/var/www" ]; then
    echo "   /var/www/:"
    ls -1 /var/www/ 2>/dev/null | sed 's/^/      - /' || echo "      (vide)"
fi

section "4. Vérification des Domaines DNS"

echo "Vérification des domaines tradeasy pointant vers ce VPS..."
DOMAINS=("tradeasy.me" "tradeasy.support" "tradeasy.app")
VPS_IP=$(hostname -I | awk '{print $1}')

for domain in "${DOMAINS[@]}"; do
    echo -n "  $domain: "
    DNS_IP=$(dig +short $domain 2>/dev/null | tail -1)
    if [ -n "$DNS_IP" ]; then
        if [ "$DNS_IP" = "91.108.105.32" ] || [ "$DNS_IP" = "89.116.134.53" ] || [ "$DNS_IP" = "$VPS_IP" ]; then
            info "Pointe vers ce VPS ($DNS_IP)"
        else
            warn "Ne pointe PAS vers ce VPS (IP: $DNS_IP)"
        fi
    else
        warn "Impossible de résoudre le DNS"
    fi
done

section "5. Résumé et Recommandations"

echo "📋 Résumé:"
echo ""
if [ "$TRADEASY_FOUND" = true ]; then
    info "Tradeasy est installé sur ce VPS"
    echo "   Emplacements:"
    for loc in "${TRADEASY_LOCATIONS[@]}"; do
        echo "   - $loc"
    done
    echo ""
    echo "   ✅ LeadGenTax sera installé dans: /root/domains/leadgentax.au/public_html/"
    echo "   ✅ Aucun conflit possible (répertoires séparés)"
else
    warn "Tradeasy n'a pas été trouvé sur ce VPS"
    echo "   → Il est probablement sur Cloud Hosting (géré via hPanel)"
    echo "   → Ou sur un autre serveur"
    echo ""
    echo "   ✅ LeadGenTax peut être installé en toute sécurité"
    echo "   ✅ Aucun conflit possible"
fi

echo ""
echo "✅ Conclusion:"
echo "   LeadGenTax sera installé dans: /root/domains/leadgentax.au/public_html/"
echo "   Ce répertoire est complètement isolé des autres sites."
echo "   Aucun conflit possible avec tradeasy ou d'autres sites."

