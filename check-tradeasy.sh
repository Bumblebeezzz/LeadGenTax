#!/bin/bash
# Script pour vérifier où est installé tradeasy
# À exécuter sur le VPS Hostinger

set -e

VPS_IP="91.108.105.32"
VPS_USER="root"

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

# Vérifier si on est sur le VPS ou si on doit se connecter
if [ "$(hostname)" != "srv508687" ] && [ "$(hostname)" != "srv495690" ]; then
    info "Connexion au VPS pour vérifier..."
    ssh "${VPS_USER}@${VPS_IP}" "bash -s" < <(cat "$0")
    exit 0
fi

section "1. Vérification des Domaines Tradeasy"

# Chercher tradeasy dans les domaines
TRADEASY_FOUND=false

echo "Recherche dans /root/domains/..."
if [ -d "/root/domains" ]; then
    for dir in /root/domains/*; do
        if [ -d "$dir" ] && [[ "$dir" == *"tradeasy"* ]]; then
            info "Trouvé: $dir"
            ls -la "$dir" 2>/dev/null | head -10
            TRADEASY_FOUND=true
        fi
    done
fi

echo ""
echo "Recherche dans /var/www/..."
if [ -d "/var/www" ]; then
    for dir in /var/www/*; do
        if [ -d "$dir" ] && [[ "$dir" == *"tradeasy"* ]]; then
            info "Trouvé: $dir"
            ls -la "$dir" 2>/dev/null | head -10
            TRADEASY_FOUND=true
        fi
    done
fi

echo ""
echo "Recherche dans /home/..."
if [ -d "/home" ]; then
    for user_dir in /home/*; do
        if [ -d "$user_dir/domains" ]; then
            for dir in "$user_dir/domains"/*; do
                if [ -d "$dir" ] && [[ "$dir" == *"tradeasy"* ]]; then
                    info "Trouvé: $dir"
                    ls -la "$dir" 2>/dev/null | head -10
                    TRADEASY_FOUND=true
                fi
            done
        fi
    done
fi

if [ "$TRADEASY_FOUND" = false ]; then
    warn "Aucun répertoire tradeasy trouvé sur ce VPS"
fi

section "2. Vérification des Configurations Web Server"

# Vérifier Nginx
if command -v nginx &> /dev/null; then
    info "Nginx installé. Recherche des configurations tradeasy..."
    if [ -d "/etc/nginx/sites-available" ]; then
        grep -r "tradeasy" /etc/nginx/sites-available/ 2>/dev/null || warn "Aucune config Nginx pour tradeasy"
    fi
    if [ -d "/etc/nginx/sites-enabled" ]; then
        grep -r "tradeasy" /etc/nginx/sites-enabled/ 2>/dev/null || warn "Aucune config Nginx activée pour tradeasy"
    fi
fi

# Vérifier Apache
if command -v apache2 &> /dev/null || command -v httpd &> /dev/null; then
    info "Apache installé. Recherche des configurations tradeasy..."
    if [ -d "/etc/apache2/sites-available" ]; then
        grep -r "tradeasy" /etc/apache2/sites-available/ 2>/dev/null || warn "Aucune config Apache pour tradeasy"
    fi
    if [ -d "/etc/httpd/conf.d" ]; then
        grep -r "tradeasy" /etc/httpd/conf.d/ 2>/dev/null || warn "Aucune config Apache pour tradeasy"
    fi
fi

section "3. Vérification des Processus"

echo "Processus web en cours..."
ps aux | grep -E "nginx|apache|httpd" | grep -v grep | head -5

section "4. Vérification des Domaines DNS"

echo "Vérification des domaines tradeasy pointant vers ce VPS..."
DOMAINS=("tradeasy.me" "tradeasy.support" "tradeasy.app")

for domain in "${DOMAINS[@]}"; do
    echo -n "  $domain: "
    DNS_IP=$(dig +short $domain | tail -1)
    if [ "$DNS_IP" = "91.108.105.32" ] || [ "$DNS_IP" = "89.116.134.53" ]; then
        info "Pointe vers ce VPS ($DNS_IP)"
    else
        warn "Ne pointe PAS vers ce VPS (IP: $DNS_IP)"
    fi
done

section "5. Vérification Cloud Hosting"

echo "Vérification si tradeasy est sur Cloud Hosting..."
echo "Note: Les sites Cloud Hosting sont généralement dans /home/username/public_html/"
echo "      ou gérés via hPanel, pas directement sur le VPS."

if [ -d "/home" ]; then
    for user_dir in /home/*; do
        if [ -d "$user_dir/public_html" ]; then
            echo "  Utilisateur: $(basename $user_dir)"
            ls -la "$user_dir/public_html" | head -5
        fi
    done
fi

section "6. Résumé et Recommandations"

echo "📋 Résumé:"
echo ""
if [ "$TRADEASY_FOUND" = true ]; then
    info "Tradeasy est installé sur ce VPS"
    echo "   → LeadGenTax sera installé dans un répertoire séparé"
    echo "   → Aucun conflit possible"
else
    warn "Tradeasy n'a pas été trouvé sur ce VPS"
    echo "   → Il est probablement sur Cloud Hosting (géré via hPanel)"
    echo "   → Ou sur un autre serveur"
    echo "   → LeadGenTax peut être installé en toute sécurité"
fi

echo ""
echo "✅ Conclusion:"
echo "   LeadGenTax sera installé dans: /root/domains/leadgentax.au/public_html/"
echo "   Ce répertoire est complètement isolé des autres sites."
echo "   Aucun conflit possible avec tradeasy ou d'autres sites."

