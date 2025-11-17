# 🚀 Guide d'Installation - LeadGenTax sur Hostinger VPS

## 📋 Prérequis et Audit Hostinger

### Étape 1 : Vérifier votre Configuration Hostinger

Avant de commencer, connectez-vous à votre compte Hostinger et vérifiez :

1. **Type de compte** : VPS ou Cloud Hosting ?
   - Allez dans **hPanel** → **Hosting** → Vérifiez le type
   - Si c'est **Cloud Hosting**, vous avez des limites de sites
   - Si c'est **VPS**, vous avez plus de flexibilité

2. **Sites existants** :
   - Allez dans **hPanel** → **Domains** → **Subdomains** ou **Addon Domains**
   - Notez le nom du site existant et son répertoire
   - Exemple : `example.com` → `/public_html/example.com/`

3. **Accès SSH** :
   - Vérifiez si SSH est activé : **hPanel** → **Advanced** → **SSH Access**
   - Notez vos identifiants SSH (si disponible)

4. **FTP/SFTP** :
   - Allez dans **hPanel** → **Files** → **FTP Accounts**
   - Créez un compte FTP séparé pour LeadGenTax (recommandé)
   - Notez : Host, Username, Password, Port (21 pour FTP, 22 pour SFTP)

5. **PHP Version** :
   - Allez dans **hPanel** → **Advanced** → **PHP Configuration**
   - Vérifiez la version PHP (minimum 7.4, recommandé 8.1+)
   - Notez la version pour chaque domaine

6. **Base de données** (si nécessaire) :
   - Pour ce site PHP, pas de base de données requise
   - Mais vérifiez l'espace disponible si vous en avez d'autres

---

## 🎯 Stratégie de Séparation des Sites

### Option A : Sous-domaine (Recommandé)
```
leadgentax.votredomaine.com → /public_html/leadgentax/
```

### Option B : Domaine séparé
```
leadgentax.au → /public_html/leadgentax/
```

### Option C : Répertoire séparé (si même domaine)
```
votredomaine.com/leadgentax → /public_html/leadgentax/
```

**⚠️ IMPORTANT** : Chaque site doit avoir son propre répertoire pour éviter les conflits.

---

## 📦 Installation Manuelle (Première fois)

### Étape 2 : Créer le Répertoire

1. Connectez-vous à **hPanel** → **File Manager**
2. Allez dans `/public_html/`
3. Créez un nouveau dossier : `leadgentax` (ou le nom de votre choix)
4. **Permissions** : 755 (dossier), 644 (fichiers)

### Étape 3 : Configurer le Domaine/Sous-domaine

#### Si vous utilisez un sous-domaine :
1. Allez dans **hPanel** → **Domains** → **Subdomains**
2. Créez : `leadgentax` (ou autre)
3. Document Root : `/public_html/leadgentax`
4. Cliquez sur **Create**

#### Si vous utilisez un domaine séparé :
1. Allez dans **hPanel** → **Domains** → **Addon Domains**
2. Ajoutez : `leadgentax.au`
3. Document Root : `/public_html/leadgentax`
4. Cliquez sur **Add Domain**

### Étape 4 : Configurer PHP

1. Allez dans **hPanel** → **Advanced** → **PHP Configuration**
2. Sélectionnez le domaine/sous-domaine de LeadGenTax
3. Choisissez **PHP 8.1** (ou la version la plus récente disponible)
4. Activez les extensions suivantes :
   - ✅ `curl`
   - ✅ `openssl`
   - ✅ `mbstring`
   - ✅ `json`
5. Cliquez sur **Save**

### Étape 5 : Télécharger les Fichiers

#### Méthode 1 : Via File Manager (hPanel)
1. Téléchargez le ZIP depuis GitHub : `https://github.com/Bumblebeezzz/LeadGenTax/archive/refs/heads/main.zip`
2. Dans **File Manager**, allez dans `/public_html/leadgentax/`
3. Uploadez le ZIP
4. Extrayez-le
5. Déplacez tous les fichiers du sous-dossier `LeadGenTax-main/` vers `/public_html/leadgentax/`

#### Méthode 2 : Via FTP/SFTP (Recommandé)
```bash
# Sur votre machine locale
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
# Utilisez FileZilla ou Cyberduck pour uploader tous les fichiers
# Vers : /public_html/leadgentax/
```

#### Méthode 3 : Via SSH (si disponible)
```bash
# Connectez-vous en SSH
ssh username@your-vps-ip

# Clonez le repository
cd /home/username/domains/yourdomain.com/public_html/
git clone https://github.com/Bumblebeezzz/LeadGenTax.git leadgentax
cd leadgentax
```

### Étape 6 : Configurer les Permissions

Via SSH ou File Manager :
```bash
# Dans /public_html/leadgentax/
chmod 755 .
chmod 644 *.php
chmod 755 router.php
chmod -R 755 static/
chmod -R 644 static/css/*.css
chmod -R 644 static/js/*.js
chmod -R 644 static/images/*
```

### Étape 7 : Configurer le Fichier config.php

1. Éditez `/public_html/leadgentax/includes/config.php`
2. Modifiez les valeurs suivantes :

```php
define('SITE_URL', 'https://leadgentax.au'); // Votre domaine/sous-domaine
define('GA4_MEASUREMENT_ID', 'G-XXXXXXXXXX'); // Votre ID Google Analytics 4
define('GOOGLE_SHEETS_SPREADSHEET_ID', 'your-spreadsheet-id');
define('TELEGRAM_BOT_TOKEN', 'your-telegram-token');
define('TELEGRAM_CHAT_ID', 'your-chat-id');
```

### Étape 8 : Tester le Site

1. Visitez votre domaine : `https://leadgentax.au` (ou votre sous-domaine)
2. Vérifiez que toutes les pages fonctionnent :
   - `/` (Home)
   - `/about`
   - `/services`
   - `/case-studies`
   - `/testimonials`
   - `/contact`

---

## 🔄 Configuration GitHub Actions pour Déploiement Automatique

### Étape 9 : Créer le Workflow GitHub Actions

Créez le fichier `.github/workflows/deploy-hostinger.yml` dans votre repository :

```yaml
name: Deploy to Hostinger VPS

on:
  push:
    branches:
      - main
  workflow_dispatch:

jobs:
  deploy:
    runs-on: ubuntu-latest
    
    steps:
      - name: Checkout code
        uses: actions/checkout@v3
      
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.1'
      
      - name: Deploy to Hostinger via FTP
        uses: SamKirkland/FTP-Deploy-Action@v4.3.4
        with:
          server: ${{ secrets.HOSTINGER_FTP_HOST }}
          username: ${{ secrets.HOSTINGER_FTP_USER }}
          password: ${{ secrets.HOSTINGER_FTP_PASSWORD }}
          server-dir: /public_html/leadgentax/
          exclude: |
            **/.git*
            **/.git*/**
            **/node_modules/**
            **/.DS_Store
            **/README.md
            **/DEPLOYMENT_NOTES.md
            **/HOSTINGER_INSTALLATION_GUIDE.md
            **/INSTRUCTIONS_RENDER.md
            **/QUICK_START.md
            **/render.yaml
            **/Dockerfile
            **/.dockerignore
            **/composer.json
            **/composer.lock
            **/.htaccess.backup
```

### Étape 10 : Configurer les Secrets GitHub

1. Allez sur GitHub → Votre repository → **Settings** → **Secrets and variables** → **Actions**
2. Ajoutez les secrets suivants :

| Secret Name | Description | Exemple |
|------------|-------------|---------|
| `HOSTINGER_FTP_HOST` | Adresse FTP Hostinger | `ftp.yourdomain.com` ou IP |
| `HOSTINGER_FTP_USER` | Nom d'utilisateur FTP | `leadgentax@yourdomain.com` |
| `HOSTINGER_FTP_PASSWORD` | Mot de passe FTP | `votre-mot-de-passe` |

**Comment trouver ces informations :**
- Allez dans **hPanel** → **Files** → **FTP Accounts**
- Si vous n'avez pas de compte FTP séparé, créez-en un :
  - **FTP Username** : `leadgentax` (ou autre)
  - **Directory** : `/public_html/leadgentax`
  - **Quota** : Illimité (ou selon vos besoins)

### Étape 11 : Tester le Déploiement

1. Faites un petit changement dans le code
2. Committez et poussez sur GitHub :
```bash
git add .
git commit -m "Test deployment"
git push origin main
```
3. Allez dans **GitHub** → **Actions** → Vérifiez que le workflow s'exécute
4. Attendez 1-2 minutes, puis vérifiez votre site

---

## 🔒 Sécurité et Isolation

### Protection contre les Conflits

1. **Répertoires séparés** :
   - Site 1 : `/public_html/site1/`
   - LeadGenTax : `/public_html/leadgentax/`
   - ✅ Aucun fichier partagé

2. **Fichiers .htaccess séparés** :
   - Chaque site a son propre `.htaccess`
   - Pas de conflit de règles

3. **Sessions PHP séparées** :
   - Chaque site utilise son propre `session_path`
   - Défini dans `config.php` : `session.cookie_path`

4. **Variables d'environnement** :
   - Chaque site a son propre `config.php`
   - Pas de variables globales partagées

### Recommandations de Sécurité

1. **Permissions strictes** :
   ```bash
   # Fichiers PHP : 644
   # Dossiers : 755
   # Fichiers sensibles (config.php) : 600 (si possible)
   ```

2. **Protection .htaccess** :
   - Le fichier `.htaccess` est déjà configuré
   - Protège contre l'accès direct aux fichiers sensibles

3. **SSL/HTTPS** :
   - Activez SSL dans **hPanel** → **SSL** → **Let's Encrypt**
   - Gratuit et automatique

---

## 🐛 Dépannage

### Problème : Site ne charge pas

1. Vérifiez les permissions des fichiers
2. Vérifiez que `router.php` est exécutable
3. Vérifiez les logs d'erreur : **hPanel** → **Advanced** → **Error Log**

### Problème : Conflit avec l'autre site

1. Vérifiez que les répertoires sont bien séparés
2. Vérifiez que chaque site a son propre `.htaccess`
3. Vérifiez les variables PHP dans `phpinfo()` pour chaque domaine

### Problème : GitHub Actions ne déploie pas

1. Vérifiez les secrets GitHub (nom exact, valeurs correctes)
2. Vérifiez les logs dans **GitHub** → **Actions**
3. Testez la connexion FTP manuellement avec FileZilla

---

## 📝 Checklist Finale

- [ ] Répertoire créé : `/public_html/leadgentax/`
- [ ] Domaine/sous-domaine configuré
- [ ] PHP 8.1+ configuré pour ce domaine
- [ ] Tous les fichiers uploadés
- [ ] Permissions configurées (755/644)
- [ ] `config.php` configuré avec vos valeurs
- [ ] Site testé et fonctionnel
- [ ] GitHub Actions configuré
- [ ] Secrets GitHub ajoutés
- [ ] Déploiement automatique testé
- [ ] SSL/HTTPS activé
- [ ] Aucun conflit avec l'autre site

---

## 🆘 Support

Si vous rencontrez des problèmes :
1. Vérifiez les logs d'erreur dans hPanel
2. Vérifiez les logs GitHub Actions
3. Testez la connexion FTP manuellement
4. Contactez le support Hostinger si nécessaire

