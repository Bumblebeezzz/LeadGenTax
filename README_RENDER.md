# Déploiement sur Render.com

## ⚠️ IMPORTANT : Configuration du Service

Ce projet doit être déployé comme **WEB SERVICE PHP** (pas STATIC SITE, pas Node.js) sur Render.com.

### Étapes pour corriger le déploiement :

1. **Supprimer le service actuel** sur Render.com (s'il est configuré en Node.js ou Static Site)
2. **Créer un nouveau service** :
   - Cliquez sur **"New +"** → **"Web Service"**
   - Sélectionnez le repository **"Bumblebeezzz / LeadGenTax"**
   - **OU** utilisez **"New from render.yaml"** si disponible
   - Si configuration manuelle :
     - **Name** : `leadgentax-website`
     - **Environment** : **PHP** (⚠️ PAS Node.js)
     - **Build Command** : (laissez vide)
     - **Start Command** : `php -S 0.0.0.0:$PORT router.php`
     - **Health Check Path** : `/`
     - **Plan** : `Free`

### ⚠️ CRITIQUE : Vérifier l'environnement

Assurez-vous que l'environnement est bien **PHP** et non **Node.js**. Si Render détecte automatiquement Node.js, c'est une erreur - forcez PHP.

### Configuration automatique via render.yaml

Le fichier `render.yaml` est présent dans le repo. Render.com devrait le détecter automatiquement lors de la création d'un nouveau service.

### Vérification

Une fois déployé, le service devrait être accessible sur `https://leagentax.onrender.com`

