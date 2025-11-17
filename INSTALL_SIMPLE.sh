#!/bin/bash
# Installation simple de LeadGenTax - À exécuter dans le terminal hPanel

set -e

echo "🚀 Installation de LeadGenTax..."
echo ""

# Créer le répertoire
INSTALL_DIR="/var/www/leadgentax.au"
echo "📁 Création du répertoire: $INSTALL_DIR"
mkdir -p "$INSTALL_DIR"
cd "$INSTALL_DIR"

# Cloner depuis GitHub (repository public, pas besoin d'auth)
echo "📥 Téléchargement depuis GitHub..."
git clone https://github.com/Bumblebeezzz/LeadGenTax.git .

# Permissions
echo "🔒 Configuration des permissions..."
chmod -R 755 .
find . -type f -exec chmod 644 {} \;
chmod 755 router.php index.php 2>/dev/null || true

# Propriétaire
if id "www-data" &>/dev/null; then
    chown -R www-data:www-data . 2>/dev/null || true
elif id "nginx" &>/dev/null; then
    chown -R nginx:nginx . 2>/dev/null || true
fi

echo ""
echo "✅ Installation terminée!"
echo "📂 Répertoire: $INSTALL_DIR"
echo ""
echo "🔧 Prochaines étapes:"
echo "   1. Configurer le domaine dans hPanel"
echo "   2. Configurer Nginx/Apache pour pointer vers $INSTALL_DIR"
echo "   3. Activer SSL (Let's Encrypt)"

