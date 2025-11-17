# 🌐 Configuration de leadgentax.com.au - Guide Complet

## ✅ Étape 1 : Vérifier que le Domaine est Actif

### Sur Hostinger
1. **Connectez-vous** à votre compte Hostinger
2. **Allez dans** "Domains" → "Manage"
3. **Vérifiez** que `leadgentax.com.au` est listé et actif
4. **Notez** les serveurs DNS actuels (si affichés)

---

## 🌍 Étape 2 : Configurer les DNS

### Option A : Via Hostinger hPanel (Recommandé)

1. **hPanel** → **Domains** → **leadgentax.com.au** → **DNS Zone Editor**
2. **Ajoutez/modifiez** ces enregistrements :

#### Enregistrement A pour le domaine principal
```
Type: A
Name: @ (ou laissez vide)
Points to: 91.108.105.32
TTL: 3600 (ou Auto)
```

#### Enregistrement A pour www
```
Type: A
Name: www
Points to: 91.108.105.32
TTL: 3600 (ou Auto)
```

3. **Sauvegardez** les modifications

### Option B : Via le Registrar (Si différent de Hostinger)

1. **Connectez-vous** à votre registrar
2. **Allez dans** la gestion DNS du domaine
3. **Ajoutez/modifiez** les mêmes enregistrements A

### Propagation DNS
- ⏱️ **Délai** : 15 minutes à 48 heures (généralement 15-30 minutes)
- ✅ **Vérifier** : Utilisez `dig leadgentax.com.au` ou `nslookup leadgentax.com.au`

---

## 🔧 Étape 3 : Configurer le Serveur Web sur le VPS

### Identifier le Serveur Web

**Sur le VPS** (via hPanel terminal ou SSH), exécutez :

```bash
# Vérifier Nginx
systemctl status nginx

# Vérifier Apache
systemctl status apache2
# ou
systemctl status httpd
```

**Notez lequel est actif** (Nginx ou Apache).

---

### Configuration Nginx

**Si Nginx est votre serveur web** :

#### 1. Créer la Configuration

```bash
# Créer le fichier de configuration
nano /etc/nginx/sites-available/leadgentax.com.au
```

#### 2. Coller cette Configuration

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name leadgentax.com.au www.leadgentax.com.au;
    
    root /var/www/leadgentax.au;
    index index.php index.html;
    
    # Logs
    access_log /var/log/nginx/leadgentax.com.au.access.log;
    error_log /var/log/nginx/leadgentax.com.au.error.log;
    
    # Configuration PHP
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;  # Ajustez la version PHP si nécessaire
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    # Router PHP pour les URLs propres
    location / {
        try_files $uri $uri/ /router.php?$query_string;
    }
    
    # Sécurité
    location ~ /\. {
        deny all;
    }
    
    # Fichiers statiques
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot|mov|mp4)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

**Sauvegarder** : `Ctrl+X`, puis `Y`, puis `Entrée`

#### 3. Activer le Site

```bash
# Créer le lien symbolique
ln -s /etc/nginx/sites-available/leadgentax.com.au /etc/nginx/sites-enabled/

# Tester la configuration
nginx -t

# Si OK, recharger Nginx
systemctl reload nginx
```

---

### Configuration Apache

**Si Apache est votre serveur web** :

#### 1. Créer la Configuration

```bash
# Créer le fichier de configuration
nano /etc/apache2/sites-available/leadgentax.com.au.conf
```

#### 2. Coller cette Configuration

```apache
<VirtualHost *:80>
    ServerName leadgentax.com.au
    ServerAlias www.leadgentax.com.au
    
    DocumentRoot /var/www/leadgentax.au
    
    <Directory /var/www/leadgentax.au>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    # Router PHP pour les URLs propres
    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ router.php?$1 [L,QSA]
    </IfModule>
    
    # Logs
    ErrorLog ${APACHE_LOG_DIR}/leadgentax.com.au_error.log
    CustomLog ${APACHE_LOG_DIR}/leadgentax.com.au_access.log combined
</VirtualHost>
```

**Sauvegarder** : `Ctrl+X`, puis `Y`, puis `Entrée`

#### 3. Activer le Site

```bash
# Activer le site
a2ensite leadgentax.com.au.conf

# Activer mod_rewrite si nécessaire
a2enmod rewrite

# Tester la configuration
apache2ctl configtest

# Si OK, recharger Apache
systemctl reload apache2
```

---

## 🔒 Étape 4 : Installer le Certificat SSL (Let's Encrypt)

### Via hPanel (Plus Simple) ⭐ RECOMMANDÉ

1. **hPanel** → **VPS** → **Manage** → **SSL**
2. **Sélectionnez** `leadgentax.com.au`
3. **Cliquez sur** "Activate Let's Encrypt SSL"
4. **Cochez** "Auto-renewal"
5. **Cochez** "Include www subdomain"
6. **Cliquez sur** "Activate"

**Attendez 2-5 minutes** pour l'activation.

---

### Via Terminal (Alternative)

#### 1. Installer Certbot

```bash
# Mettre à jour les paquets
apt update

# Installer Certbot
apt install -y certbot python3-certbot-nginx  # Pour Nginx
# ou
apt install -y certbot python3-certbot-apache  # Pour Apache
```

#### 2. Générer le Certificat

**Pour Nginx** :
```bash
certbot --nginx -d leadgentax.com.au -d www.leadgentax.com.au
```

**Pour Apache** :
```bash
certbot --apache -d leadgentax.com.au -d www.leadgentax.com.au
```

**Pendant l'installation, Certbot vous demandera :**
- Email : Entrez votre email
- Conditions : Acceptez (A)
- Redirection HTTP → HTTPS : Choisissez 2 (redirection)

#### 3. Vérifier le Renouvellement Automatique

```bash
# Tester le renouvellement
certbot renew --dry-run
```

---

## ✅ Étape 5 : Vérification

### 1. Vérifier le DNS

**Sur votre Mac** ou en ligne :

```bash
# Vérifier que le DNS pointe vers le VPS
dig leadgentax.com.au

# Ou
nslookup leadgentax.com.au
```

**Résultat attendu** : `91.108.105.32`

**Si ce n'est pas le cas** :
- ⏱️ Attendez 15-30 minutes (propagation DNS)
- 🔄 Vérifiez que les enregistrements DNS sont corrects

---

### 2. Tester le Site

1. **Ouvrez** `http://leadgentax.com.au` (devrait rediriger vers HTTPS)
2. **Ouvrez** `https://leadgentax.com.au` (devrait afficher le site avec cadenas vert)
3. **Testez** `https://www.leadgentax.com.au` (devrait aussi fonctionner)

---

### 3. Vérifier les Logs

**Sur le VPS** :

```bash
# Nginx
tail -f /var/log/nginx/leadgentax.com.au.access.log

# Apache
tail -f /var/log/apache2/leadgentax.com.au_access.log
```

---

## 🔧 Étape 6 : Mettre à Jour la Configuration du Site

### Mettre à Jour l'URL dans le Code

**Sur votre Mac**, modifiez le fichier de configuration :

```bash
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
nano includes/config.php
```

**Changez** :
```php
define('SITE_URL', 'https://leadgentax.com.au');
```

**Puis** :
```bash
git add includes/config.php
git commit -m "Mise à jour URL vers leadgentax.com.au"
git push origin main
```

Le site sera automatiquement mis à jour sur le VPS via GitHub Actions ! ✅

---

## 🆘 Dépannage

### Le site ne s'affiche pas

1. **Vérifiez le DNS** :
   ```bash
   dig leadgentax.com.au
   ```
   Doit retourner `91.108.105.32`

2. **Vérifiez le serveur web** :
   ```bash
   systemctl status nginx
   # ou
   systemctl status apache2
   ```

3. **Vérifiez les logs** :
   ```bash
   tail -f /var/log/nginx/leadgentax.com.au.error.log
   # ou
   tail -f /var/log/apache2/leadgentax.com.au_error.log
   ```

### Erreur 502 Bad Gateway

**Cause** : PHP-FPM n'est pas démarré

**Solution** :
```bash
# Vérifier PHP-FPM
systemctl status php8.1-fpm  # Ajustez la version

# Redémarrer si nécessaire
systemctl restart php8.1-fpm
```

### Erreur 403 Forbidden

**Cause** : Problème de permissions

**Solution** :
```bash
# Vérifier les permissions
ls -la /var/www/leadgentax.au/

# Corriger si nécessaire
chown -R www-data:www-data /var/www/leadgentax.au/
chmod -R 755 /var/www/leadgentax.au/
```

### Le certificat SSL ne s'installe pas

1. **Vérifiez que le DNS est propagé** :
   ```bash
   dig leadgentax.com.au
   ```

2. **Vérifiez que le port 80 est ouvert** :
   ```bash
   netstat -tuln | grep :80
   ```

3. **Réessayez Certbot** :
   ```bash
   certbot --nginx -d leadgentax.com.au -d www.leadgentax.com.au --force-renewal
   ```

---

## 📋 Checklist Finale

- [ ] Domaine `leadgentax.com.au` acheté et actif
- [ ] DNS configuré (A record vers `91.108.105.32`)
- [ ] DNS propagé (vérifié avec `dig`)
- [ ] Serveur web configuré (Nginx ou Apache)
- [ ] Site accessible en HTTP
- [ ] Certificat SSL installé (Let's Encrypt)
- [ ] Site accessible en HTTPS
- [ ] Redirection HTTP → HTTPS active
- [ ] `www.leadgentax.com.au` fonctionne
- [ ] Configuration du site mise à jour (`SITE_URL`)

---

## 🎉 Résultat Final

Une fois configuré, votre site sera accessible via :
- ✅ `https://leadgentax.com.au`
- ✅ `https://www.leadgentax.com.au`
- ✅ Redirection automatique HTTP → HTTPS
- ✅ Certificat SSL valide (cadenas vert)
- ✅ Déploiement automatique via GitHub Actions

---

## 🚀 Prochaines Étapes

1. ✅ **Testez le site** : `https://leadgentax.com.au`
2. ✅ **Vérifiez le SSL** : Cadenas vert dans le navigateur
3. ✅ **Mettez à jour** `SITE_URL` dans `includes/config.php`
4. ✅ **Poussez les changements** sur GitHub
5. ✅ **Le site se mettra à jour automatiquement** ! 🎉

---

**Dernière mise à jour** : 2025-11-17

