#!/bin/bash
# Script de déploiement automatique via SSH
# Exécute le script d'installation sur le VPS Hostinger

set -e

VPS_IP="91.108.105.32"
VPS_USER="root"
INSTALL_SCRIPT="install.sh"

echo "🚀 Déploiement automatique de LeadGenTax sur Hostinger VPS..."
echo ""

# Vérifier que le script d'installation existe
if [ ! -f "$INSTALL_SCRIPT" ]; then
    echo "❌ Erreur: $INSTALL_SCRIPT non trouvé"
    exit 1
fi

# Copier le script sur le VPS
echo "📤 Upload du script d'installation..."
scp "$INSTALL_SCRIPT" "${VPS_USER}@${VPS_IP}:/tmp/"

# Exécuter le script sur le VPS
echo "▶️  Exécution du script sur le VPS..."
ssh "${VPS_USER}@${VPS_IP}" "chmod +x /tmp/$INSTALL_SCRIPT && /tmp/$INSTALL_SCRIPT"

echo ""
echo "✅ Déploiement terminé!"

