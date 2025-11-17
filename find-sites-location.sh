#!/bin/bash
# Script pour trouver où sont installés les sites sur le VPS
# À exécuter dans le terminal hPanel

echo "🔍 Recherche des sites installés sur le VPS..."
echo ""

# Couleurs
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

info() {
    echo -e "${GREEN}✓${NC} $1"
}

section() {
    echo -e "\n${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"
}

section "1. Vérification des Répertoires Communs"

echo "Vérification /var/www/..."
if [ -d "/var/www" ]; then
    info "/var/www/ existe"
    echo "   Contenu:"
    ls -la /var/www/ | sed 's/^/   /'
else
    echo "   /var/www/ n'existe pas"
fi

echo ""
echo "Vérification /home/..."
if [ -d "/home" ]; then
    info "/home/ existe"
    for user_dir in /home/*; do
        if [ -d "$user_dir" ]; then
            echo "   Utilisateur: $(basename $user_dir)"
            if [ -d "$user_dir/public_html" ]; then
                echo "      public_html existe"
                ls -la "$user_dir/public_html" | head -5 | sed 's/^/      /'
            fi
            if [ -d "$user_dir/domains" ]; then
                echo "      domains existe"
                ls -la "$user_dir/domains" | sed 's/^/      /'
            fi
        fi
    done
else
    echo "   /home/ n'existe pas"
fi

echo ""
echo "Vérification /usr/share/nginx/html/..."
if [ -d "/usr/share/nginx/html" ]; then
    info "/usr/share/nginx/html/ existe"
    ls -la /usr/share/nginx/html/ | head -5 | sed 's/^/   /'
fi

section "2. Recherche de Sites Existants"

echo "Recherche earthstralia..."
find /var/www /home /usr/share -name "*earthstralia*" -type d 2>/dev/null | head -5

echo ""
echo "Recherche tradeasy..."
find /var/www /home /usr/share -name "*tradeasy*" -type d 2>/dev/null | head -5

echo ""
echo "Recherche echomeridian..."
find /var/www /home /usr/share -name "*echomeridian*" -type d 2>/dev/null | head -5

section "3. Vérification des Configurations Web Server"

echo "Vérification Nginx..."
if command -v nginx &> /dev/null; then
    info "Nginx installé"
    if [ -d "/etc/nginx/sites-available" ]; then
        echo "   Sites configurés:"
        ls -1 /etc/nginx/sites-available/ | sed 's/^/      - /'
    fi
    if [ -d "/etc/nginx/sites-enabled" ]; then
        echo "   Sites activés:"
        ls -1 /etc/nginx/sites-enabled/ | sed 's/^/      - /'
    fi
else
    echo "   Nginx non installé"
fi

echo ""
echo "Vérification Apache..."
if command -v apache2 &> /dev/null || command -v httpd &> /dev/null; then
    info "Apache installé"
    if [ -d "/etc/apache2/sites-available" ]; then
        echo "   Sites configurés:"
        ls -1 /etc/apache2/sites-available/ | sed 's/^/      - /'
    fi
else
    echo "   Apache non installé"
fi

section "4. Recommandation pour LeadGenTax"

echo "📋 Structure recommandée pour LeadGenTax:"
echo ""
echo "Option 1: Créer /root/domains/leadgentax.au/public_html/"
echo "   → Structure standard Hostinger"
echo ""
echo "Option 2: Utiliser /var/www/leadgentax.au/"
echo "   → Structure standard Linux"
echo ""
echo "Option 3: Utiliser /home/leadgentax/public_html/"
echo "   → Si vous créez un utilisateur dédié"
echo ""

