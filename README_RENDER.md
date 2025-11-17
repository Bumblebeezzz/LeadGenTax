# Déploiement sur Render.com

## ⚠️ IMPORTANT : Configuration du Service

Ce projet doit être déployé comme **WEB SERVICE** (pas STATIC SITE) sur Render.com.

### Étapes pour corriger le déploiement :

1. **Supprimer le service actuel** (STATIC SITE) sur Render.com
2. **Créer un nouveau service** :
   - Type : **Web Service** (pas Static Site)
   - Environment : **PHP**
   - Build Command : `echo "No build required for PHP"`
   - Start Command : `php -S 0.0.0.0:$PORT router.php`
   - Health Check Path : `/`

### Configuration automatique via render.yaml

Le fichier `render.yaml` est présent dans le repo. Render.com devrait le détecter automatiquement lors de la création d'un nouveau service.

### Vérification

Une fois déployé, le service devrait être accessible sur `https://leagentax.onrender.com`

