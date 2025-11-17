#!/bin/bash
# Script de déploiement manuel pour tester sur le VPS

set -x  # Mode debug

echo "🚀 Début du déploiement..."
echo "📍 Répertoire actuel: $(pwd)"
echo "👤 Utilisateur: $(whoami)"

# Créer le répertoire s'il n'existe pas
echo "📁 Création/vérification du répertoire..."
mkdir -p /var/www/leadgentax.au
cd /var/www/leadgentax.au || {
    echo "❌ Impossible d'accéder à /var/www/leadgentax.au"
    exit 1
}
echo "✅ Répertoire: $(pwd)"

# Configurer Git pour éviter l'erreur "dubious ownership"
echo "🔧 Configuration Git..."
git config --global --add safe.directory /var/www/leadgentax.au || true

# Mettre à jour via Git
if [ -d ".git" ]; then
    echo "📥 Repository Git détecté, mise à jour..."
    echo "🔍 État actuel:"
    git status --short || true
    git remote -v || true
    
    echo "📥 Fetch depuis origin..."
    git fetch origin main || {
        echo "⚠️ git fetch échoué, tentative de réinitialisation..."
        git remote set-url origin https://github.com/Bumblebeezzz/LeadGenTax.git || true
        git fetch origin main || true
    }
    
    echo "🔄 Reset vers origin/main..."
    git reset --hard origin/main || {
        echo "⚠️ git reset échoué, tentative avec git pull..."
        git pull origin main || {
            echo "❌ git pull échoué"
            exit 1
        }
    }
    echo "✅ Mise à jour Git réussie"
else
    echo "📥 Pas de repository Git, clonage..."
    if [ -f "/tmp/leadgentax_temp/.git/config" ]; then
        rm -rf /tmp/leadgentax_temp
    fi
    git clone https://github.com/Bumblebeezzz/LeadGenTax.git /tmp/leadgentax_temp || {
        echo "❌ Échec du clonage"
        exit 1
    }
    
    echo "📋 Copie des fichiers..."
    rm -rf /var/www/leadgentax.au/* /var/www/leadgentax.au/.[!.]* 2>/dev/null || true
    cp -r /tmp/leadgentax_temp/* /var/www/leadgentax.au/ || {
        echo "❌ Échec de la copie"
        exit 1
    }
    cp -r /tmp/leadgentax_temp/.git /var/www/leadgentax.au/ 2>/dev/null || true
    rm -rf /tmp/leadgentax_temp
    echo "✅ Clonage et copie réussis"
fi

# Permissions
echo "🔐 Mise à jour des permissions..."
chmod -R 755 . || echo "⚠️ Erreur chmod 755"
find . -type f -exec chmod 644 {} \; || echo "⚠️ Erreur chmod 644"
chmod 755 router.php index.php 2>/dev/null || echo "⚠️ Erreur chmod router/index"

# Propriétaire
echo "👤 Mise à jour du propriétaire..."
if id "www-data" &>/dev/null; then
    chown -R www-data:www-data . 2>/dev/null || echo "⚠️ Erreur chown www-data"
    echo "✅ Propriétaire: www-data"
elif id "nginx" &>/dev/null; then
    chown -R nginx:nginx . 2>/dev/null || echo "⚠️ Erreur chown nginx"
    echo "✅ Propriétaire: nginx"
else
    echo "⚠️ Aucun utilisateur www-data ou nginx trouvé"
fi

echo "✅ Déploiement terminé avec succès"
echo "📊 Vérification finale:"
ls -la /var/www/leadgentax.au/ | head -5

