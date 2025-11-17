#!/bin/bash
# Script d'installation automatique - LeadGenTax sur Hostinger VPS
# Ce script installe LeadGenTax dans un répertoire isolé pour éviter les conflits

set -e  # Arrêter en cas d'erreur

echo "🚀 Installation automatique de LeadGenTax..."
echo ""

# Configuration
VPS_IP="91.108.105.32"
DOMAIN="leadgentax.au"

# Détecter automatiquement le meilleur répertoire d'installation
if [ -d "/var/www" ]; then
    INSTALL_DIR="/var/www/${DOMAIN}"
elif [ -d "/root/domains" ]; then
    INSTALL_DIR="/root/domains/${DOMAIN}/public_html"
else
    INSTALL_DIR="/root/${DOMAIN}"
fi

BACKUP_DIR="/root/backups/leadgentax_$(date +%Y%m%d_%H%M%S)"

# Couleurs pour les messages
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Fonction pour afficher les messages
info() {
    echo -e "${GREEN}✓${NC} $1"
}

warn() {
    echo -e "${YELLOW}⚠${NC} $1"
}

error() {
    echo -e "${RED}✗${NC} $1"
    exit 1
}

# Vérifier qu'on est sur le VPS
if [ ! -d "/root" ]; then
    error "Ce script doit être exécuté sur le VPS Hostinger"
fi

info "Vérification de l'environnement..."

# Vérifier PHP
if ! command -v php &> /dev/null; then
    warn "PHP n'est pas installé. Installation..."
    apt update
    apt install -y php8.1 php8.1-cli php8.1-fpm php8.1-curl php8.1-mbstring php8.1-xml php8.1-zip
fi

PHP_VERSION=$(php -v | head -n 1 | cut -d " " -f 2 | cut -d "." -f 1,2)
info "PHP version: $PHP_VERSION"

# Vérifier qu'il n'y a pas de conflit avec tradeasy
info "Vérification des conflits potentiels..."
if [ -d "/root/domains/tradeasy" ] || [ -d "/var/www/tradeasy" ]; then
    warn "Tradeasy détecté. Vérification de l'isolation..."
    if [ -d "$INSTALL_DIR" ] && [ -f "$INSTALL_DIR/index.php" ]; then
        # Vérifier que ce n'est pas le même site
        if grep -q "LeadGenTax" "$INSTALL_DIR/index.php" 2>/dev/null; then
            info "LeadGenTax déjà installé dans $INSTALL_DIR"
        else
            warn "Un autre site est présent dans $INSTALL_DIR"
            read -p "Voulez-vous continuer? (y/n) " -n 1 -r
            echo
            if [[ ! $REPLY =~ ^[Yy]$ ]]; then
                error "Installation annulée"
            fi
        fi
    fi
fi

# Créer le répertoire d'installation
info "Création du répertoire d'installation..."
mkdir -p "$INSTALL_DIR"
cd "$INSTALL_DIR"

# Créer un backup si le répertoire existe déjà
if [ "$(ls -A $INSTALL_DIR 2>/dev/null)" ]; then
    warn "Le répertoire n'est pas vide. Création d'un backup..."
    mkdir -p "$BACKUP_DIR"
    cp -r "$INSTALL_DIR"/* "$BACKUP_DIR/" 2>/dev/null || true
    info "Backup créé dans: $BACKUP_DIR"
fi

# Télécharger depuis GitHub
info "Téléchargement depuis GitHub..."
if [ -d ".git" ]; then
    info "Repository Git détecté. Mise à jour..."
    git pull origin main || git fetch && git reset --hard origin/main
else
    info "Clonage du repository..."
    rm -rf ./*
    rm -rf .[^.]* 2>/dev/null || true
    git clone https://github.com/Bumblebeezzz/LeadGenTax.git .
fi

# Configurer les permissions
info "Configuration des permissions..."
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod 755 router.php index.php 2>/dev/null || true

# Configurer le propriétaire (www-data ou nginx)
if id "www-data" &>/dev/null; then
    chown -R www-data:www-data . 2>/dev/null || true
    info "Propriétaire configuré: www-data"
elif id "nginx" &>/dev/null; then
    chown -R nginx:nginx . 2>/dev/null || true
    info "Propriétaire configuré: nginx"
else
    warn "Utilisateur web non trouvé. Permissions root conservées."
fi

# Créer le fichier config.php si nécessaire
if [ ! -f "includes/config.php" ]; then
    error "Fichier config.php non trouvé"
fi

# Vérifier que le domaine pointe vers ce répertoire
info "Vérification de la configuration du domaine..."
if [ -f "/etc/nginx/sites-available/${DOMAIN}" ] || [ -f "/etc/apache2/sites-available/${DOMAIN}.conf" ]; then
    info "Configuration web server trouvée pour ${DOMAIN}"
else
    warn "Configuration web server non trouvée. Vous devrez la créer manuellement."
fi

# Résumé
echo ""
info "✅ Installation terminée!"
echo ""
echo "📋 Informations:"
echo "   - Répertoire: $INSTALL_DIR"
echo "   - Domaine: $DOMAIN"
echo "   - PHP: $PHP_VERSION"
echo ""
echo "🔧 Prochaines étapes:"
echo "   1. Configurez le domaine dans hPanel si ce n'est pas déjà fait"
echo "   2. Configurez SSL (Let's Encrypt)"
echo "   3. Modifiez includes/config.php avec vos valeurs"
echo "   4. Testez le site: https://${DOMAIN}"
echo ""

