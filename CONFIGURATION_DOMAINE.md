# 🌐 Configuration d'un Nom de Domaine pour LeadGenTax

## 📋 Vue d'Ensemble

Pour lier un nom de domaine (ex: `leadgentax.au`) au site sur le VPS, il faut :
1. **Configurer le DNS** chez votre registrar de domaine
2. **Configurer le serveur web** (Nginx ou Apache) sur le VPS
3. **Installer un certificat SSL** (Let's Encrypt)

---

## 🔍 Étape 1 : Identifier le Serveur Web

**Sur le VPS** (via hPanel terminal), exécutez :

```bash
# Vérifier si Nginx est installé
systemctl status nginx

# Vérifier si Apache est installé
systemctl status apache2
# ou
systemctl status httpd
```

**Notez lequel est actif** (Nginx ou Apache).

---

## 🌍 Étape 2 : Configuration DNS

### Chez votre Registrar de Domaine

1. **Connectez-vous** à votre registrar (ex: Namecheap, GoDaddy, etc.)
2. **Allez dans la gestion DNS** de votre domaine
3. **Ajoutez/modifiez les enregistrements suivants** :

#### Pour le domaine principal (ex: `leadgentax.au`)
```
Type: A
Nom: @ (ou laissez vide)
Valeur: 91.108.105.32
TTL: 3600 (ou Auto)
```

#### Pour le sous-domaine www (ex: `www.leadgentax.au`)
```
Type: A
Nom: www
Valeur: 91.108.105.32
TTL: 3600 (ou Auto)
```

### Propagation DNS
- ⏱️ **Délai** : 5 minutes à 48 heures (généralement 15-30 minutes)
- ✅ **Vérifier** : Utilisez `dig leadgentax.au` ou `nslookup leadgentax.au`

---

## 🔧 Étape 3 : Configuration Nginx

### Si Nginx est votre serveur web

**Sur le VPS**, créez/modifiez le fichier de configuration :

```bash
# Créer le fichier de configuration
nano /etc/nginx/sites-available/leadgentax.au
```

**Contenu du fichier** :

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name leadgentax.au www.leadgentax.au;
    
    root /var/www/leadgentax.au;
    index index.php index.html;
    
    # Logs
    access_log /var/log/nginx/leadgentax.au.access.log;
    error_log /var/log/nginx/leadgentax.au.error.log;
    
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
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

**Activer la configuration** :

```bash
# Créer le lien symbolique
ln -s /etc/nginx/sites-available/leadgentax.au /etc/nginx/sites-enabled/

# Tester la configuration
nginx -t

# Recharger Nginx
systemctl reload nginx
```

---

## 🔧 Étape 4 : Configuration Apache

### Si Apache est votre serveur web

**Sur le VPS**, créez/modifiez le fichier de configuration :

```bash
# Créer le fichier de configuration
nano /etc/apache2/sites-available/leadgentax.au.conf
```

**Contenu du fichier** :

```apache
<VirtualHost *:80>
    ServerName leadgentax.au
    ServerAlias www.leadgentax.au
    
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
    ErrorLog ${APACHE_LOG_DIR}/leadgentax.au_error.log
    CustomLog ${APACHE_LOG_DIR}/leadgentax.au_access.log combined
</VirtualHost>
```

**Activer la configuration** :

```bash
# Activer le site
a2ensite leadgentax.au.conf

# Activer mod_rewrite si nécessaire
a2enmod rewrite

# Tester la configuration
apache2ctl configtest

# Recharger Apache
systemctl reload apache2
```

---

## 🔒 Étape 5 : Installation du Certificat SSL (Let's Encrypt)

### Installation de Certbot

```bash
# Mettre à jour les paquets
apt update

# Installer Certbot
apt install certbot python3-certbot-nginx  # Pour Nginx
# ou
apt install certbot python3-certbot-apache  # Pour Apache
```

### Obtenir le Certificat SSL

#### Pour Nginx :
```bash
certbot --nginx -d leadgentax.au -d www.leadgentax.au
```

#### Pour Apache :
```bash
certbot --apache -d leadgentax.au -d www.leadgentax.au
```

**Pendant l'installation, Certbot vous demandera :**
- Email : Entrez votre email
- Conditions : Acceptez (A)
- Redirection HTTP → HTTPS : Choisissez 2 (redirection)

### Renouvellement Automatique

Certbot configure automatiquement le renouvellement. Vérifiez avec :

```bash
# Tester le renouvellement
certbot renew --dry-run
```

---

## ✅ Étape 6 : Vérification

### 1. Vérifier le DNS
```bash
# Sur votre Mac ou en ligne
dig leadgentax.au
# ou
nslookup leadgentax.au
```

**Résultat attendu** : `91.108.105.32`

### 2. Vérifier le Site
- Ouvrez `http://leadgentax.au` (devrait rediriger vers HTTPS)
- Ouvrez `https://leadgentax.au` (devrait afficher le site avec cadenas vert)

### 3. Vérifier les Logs
```bash
# Nginx
tail -f /var/log/nginx/leadgentax.au.access.log

# Apache
tail -f /var/log/apache2/leadgentax.au_access.log
```

---

## 🔧 Configuration Alternative : hPanel

Si vous utilisez **Hostinger hPanel**, vous pouvez aussi :

1. **Connectez-vous à hPanel**
2. **Allez dans "Domaines"** → "Gérer"
3. **Ajoutez le domaine** `leadgentax.au`
4. **Pointez vers** `/var/www/leadgentax.au`
5. **Activez SSL** via hPanel (Let's Encrypt)

---

## 🆘 Dépannage

### Le site ne s'affiche pas

1. **Vérifiez le DNS** :
   ```bash
   dig leadgentax.au
   ```

2. **Vérifiez le serveur web** :
   ```bash
   systemctl status nginx
   # ou
   systemctl status apache2
   ```

3. **Vérifiez les logs** :
   ```bash
   tail -f /var/log/nginx/leadgentax.au.error.log
   # ou
   tail -f /var/log/apache2/leadgentax.au_error.log
   ```

### Erreur 502 Bad Gateway

**Cause** : PHP-FPM n'est pas démarré ou mal configuré

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

---

## 📝 Checklist Finale

- [ ] DNS configuré (A record pointant vers `91.108.105.32`)
- [ ] Serveur web configuré (Nginx ou Apache)
- [ ] Site accessible en HTTP
- [ ] Certificat SSL installé (Let's Encrypt)
- [ ] Site accessible en HTTPS
- [ ] Redirection HTTP → HTTPS active
- [ ] Logs fonctionnels

---

## 🎉 Résultat

Une fois configuré, votre site sera accessible via :
- ✅ `https://leadgentax.au`
- ✅ `https://www.leadgentax.au`
- ✅ Redirection automatique HTTP → HTTPS
- ✅ Certificat SSL valide (cadenas vert)

---

**Dernière mise à jour** : 2025-11-17

