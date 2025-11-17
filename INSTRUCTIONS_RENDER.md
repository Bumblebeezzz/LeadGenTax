# 🚨 URGENT : Correction du déploiement Render.com

## Problème actuel
Le service sur Render.com est configuré avec **Node.js** au lieu de **PHP**. Il faut le corriger manuellement.

## Solution : Modifier le service existant

### Option 1 : Modifier les paramètres du service (RECOMMANDÉ)

1. Allez sur **Render.com Dashboard**
2. Cliquez sur le service **"LeaGenTax"** ou **"leadgentax-website"**
3. Allez dans **"Settings"** (Paramètres)
4. Dans la section **"Environment"**, changez :
   - **Environment** : `Node.js` → **`PHP`**
5. Dans la section **"Build & Deploy"** :
   - **Build Command** : (laissez **VIDE** ou supprimez tout)
   - **Start Command** : `php -S 0.0.0.0:$PORT router.php`
6. Cliquez sur **"Save Changes"**
7. Le service va redémarrer automatiquement

### Option 2 : Supprimer et recréer le service

1. **Supprimez** le service actuel sur Render.com
2. Cliquez sur **"New +"** → **"Web Service"**
3. Sélectionnez **"Bumblebeezzz / LeadGenTax"**
4. **IMPORTANT** : Dans le menu déroulant **"Environment"**, sélectionnez **`PHP`** (pas Node.js)
5. Render devrait détecter automatiquement le `render.yaml` et pré-remplir les champs
6. Vérifiez que :
   - **Environment** : `PHP`
   - **Build Command** : (vide)
   - **Start Command** : `php -S 0.0.0.0:$PORT router.php`
7. Cliquez sur **"Create Web Service"**

## Vérification

Une fois le service redémarré, les logs devraient montrer :
```
==> Using PHP version 8.1
==> Running 'php -S 0.0.0.0:$PORT router.php'
```

Au lieu de :
```
==> Using Node.js version...
==> Running 'yarn start'
```

## Si Render ne détecte pas PHP automatiquement

Si Render continue à détecter Node.js :
1. Forcez manuellement **PHP** dans les paramètres
2. Assurez-vous qu'il n'y a pas de `package.json` dans le repo (déjà supprimé)
3. Le `render.yaml` spécifie bien `env: php`

