# 🔧 Installation Détaillée - LeadGenTax sur VPS Hostinger

## 📊 Informations VPS Confirmées

### VPS Sélectionné : `srv508687.hstgr.cloud` ⭐

- **IP** : `91.108.105.32`
- **OS** : Ubuntu 22.04 LTS
- **SSH** : `ssh root@91.108.105.32`
- **Ressources** :
  - CPU : 2 cores (1% usage)
  - RAM : 8 GB (18% usage)
  - Disk : 100 GB (24 GB utilisé, 76 GB disponible)
  - Bandwidth : 8 TB (0.001 TB utilisé)
- **Uptime** : 198 jours (très stable)
- **Expiration** : 2026-04-14

---

## 🚀 Installation Complète

### Étape 1 : Connexion SSH

```bash
ssh root@91.108.105.32
```

**Si première connexion** : Vous devrez accepter la clé SSH et entrer le mot de passe root.

---

### Étape 2 : Vérifier la Structure Existante

```bash
# Voir la structure actuelle
ls -la /root/
ls -la /var/www/

# Chercher où est installé earthstralia.com
find /root -name "*earthstralia*" -type d 2>/dev/null
find /var/www -name "*earthstralia*" -type d 2>/dev/null

# Vérifier les sites web existants
ls -la /root/domains/ 2>/dev/null
ls -la /var/www/ 2>/dev/null
```

**Notez** la structure trouvée pour éviter les conflits.

---

### Étape 3 : Créer la Structure pour LeadGenTax

#### Option A : Structure Hostinger Standard

```bash
# Créer le répertoire
mkdir -p /root/domains/leadgentax.au/public_html

# Permissions
chmod 755 /root/domains/leadgentax.au
chmod 755 /root/domains/leadgentax.au/public_html
```

#### Option B : Structure Alternative

```bash
# Si la structure est différente
mkdir -p /var/www/leadgentax.au/public_html
chmod 755 /var/www/leadgentax.au
chmod 755 /var/www/leadgentax.au/public_html
```

---

### Étape 4 : Installer PHP 8.1+ (si nécessaire)

```bash
# Vérifier la version PHP
php -v

# Si PHP < 8.1, installer PHP 8.1
apt update
apt install -y php8.1 php8.1-cli php8.1-fpm php8.1-curl php8.1-mbstring php8.1-xml php8.1-zip

# Vérifier les extensions
php -m | grep -E "curl|openssl|mbstring|json"
```

---

### Étape 5 : Configurer Nginx ou Apache

#### Si Nginx est installé :

```bash
# Vérifier si Nginx est installé
nginx -v

# Créer la configuration
nano /etc/nginx/sites-available/leadgentax.au
```

**Configuration Nginx** :
```nginx
server {
    listen 80;
    server_name leadgentax.au www.leadgentax.au;
    root /root/domains/leadgentax.au/public_html;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /router.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\. {
        deny all;
    }
}
```

```bash
# Activer le site
ln -s /etc/nginx/sites-available/leadgentax.au /etc/nginx/sites-enabled/
nginx -t
systemctl reload nginx
```

#### Si Apache est installé :

Le fichier `.htaccess` dans le projet gère déjà la configuration Apache.

```bash
# Vérifier si Apache est installé
apache2 -v

# Créer la configuration
nano /etc/apache2/sites-available/leadgentax.au.conf
```

**Configuration Apache** :
```apache
<VirtualHost *:80>
    ServerName leadgentax.au
    ServerAlias www.leadgentax.au
    DocumentRoot /root/domains/leadgentax.au/public_html
    
    <Directory /root/domains/leadgentax.au/public_html>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/leadgentax_error.log
    CustomLog ${APACHE_LOG_DIR}/leadgentax_access.log combined
</VirtualHost>
```

```bash
# Activer le site
a2ensite leadgentax.au.conf
systemctl reload apache2
```

---

### Étape 6 : Uploader les Fichiers

#### Méthode 1 : Via Git (Recommandé)

```bash
cd /root/domains/leadgentax.au/public_html
git clone https://github.com/Bumblebeezzz/LeadGenTax.git .
```

#### Méthode 2 : Via SFTP

```bash
# Sur votre machine locale
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
sftp root@91.108.105.32
cd /root/domains/leadgentax.au/public_html
put -r *
```

#### Méthode 3 : Via rsync (si disponible)

```bash
# Sur votre machine locale
rsync -avz --exclude '.git' \
  /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP/ \
  root@91.108.105.32:/root/domains/leadgentax.au/public_html/
```

---

### Étape 7 : Configurer les Permissions

```bash
cd /root/domains/leadgentax.au/public_html

# Permissions des fichiers
find . -type f -exec chmod 644 {} \;

# Permissions des dossiers
find . -type d -exec chmod 755 {} \;

# Permissions spéciales
chmod 755 router.php
chmod 755 index.php

# Propriétaire (ajuster selon votre utilisateur web)
chown -R www-data:www-data .
# ou
chown -R root:www-data .
```

---

### Étape 8 : Configurer config.php

```bash
nano /root/domains/leadgentax.au/public_html/includes/config.php
```

**Modifier** :
```php
define('SITE_URL', 'https://leadgentax.au');
define('GA4_MEASUREMENT_ID', 'G-XXXXXXXXXX'); // Votre ID GA4
```

---

### Étape 9 : Configurer SSL (Let's Encrypt)

```bash
# Installer Certbot (si pas déjà installé)
apt install -y certbot python3-certbot-nginx
# ou pour Apache
apt install -y certbot python3-certbot-apache

# Générer le certificat SSL
certbot --nginx -d leadgentax.au -d www.leadgentax.au
# ou pour Apache
certbot --apache -d leadgentax.au -d www.leadgentax.au

# Auto-renewal (déjà configuré par Certbot)
```

---

### Étape 10 : Configurer GitHub Actions

1. **GitHub** → https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. **Ajoutez les secrets** :

```
HOSTINGER_FTP_HOST = 91.108.105.32
HOSTINGER_FTP_USER = root
HOSTINGER_FTP_PASSWORD = [votre mot de passe root]
```

**⚠️ Note** : Pour plus de sécurité, créez un utilisateur FTP dédié (voir Étape 3 de l'audit).

---

### Étape 11 : Tester le Site

1. **Visitez** : `http://leadgentax.au` (puis `https://leadgentax.au` après SSL)
2. **Vérifiez** toutes les pages :
   - `/` (Home)
   - `/about`
   - `/services`
   - `/contact`

---

## 🔒 Sécurité

### Firewall (UFW)

```bash
# Installer UFW si pas déjà installé
apt install -y ufw

# Autoriser SSH
ufw allow 22/tcp

# Autoriser HTTP/HTTPS
ufw allow 80/tcp
ufw allow 443/tcp

# Activer le firewall
ufw enable
ufw status
```

### Malware Scanner

```bash
# Installer ClamAV (recommandé)
apt install -y clamav clamav-daemon
freshclam
clamscan -r /root/domains/leadgentax.au/public_html/
```

---

## 📊 Monitoring

### Vérifier les Ressources

```bash
# CPU et Memory
htop

# Disk usage
df -h
du -sh /root/domains/leadgentax.au/

# Logs
tail -f /var/log/nginx/error.log
# ou
tail -f /var/log/apache2/error.log
```

---

## ✅ Checklist Finale

- [ ] VPS accessible via SSH
- [ ] Structure de répertoires créée
- [ ] PHP 8.1+ installé et configuré
- [ ] Nginx/Apache configuré
- [ ] Fichiers uploadés
- [ ] Permissions configurées
- [ ] `config.php` modifié
- [ ] SSL/HTTPS activé
- [ ] GitHub Actions configuré
- [ ] Site testé et fonctionnel
- [ ] Firewall configuré
- [ ] Monitoring en place

---

## 🆘 Dépannage

### Le site ne charge pas

```bash
# Vérifier les logs
tail -50 /var/log/nginx/error.log
# ou
tail -50 /var/log/apache2/error.log

# Vérifier les permissions
ls -la /root/domains/leadgentax.au/public_html/

# Tester PHP
php -r "echo 'PHP works';"
```

### Erreur 500

```bash
# Vérifier les permissions
chmod 755 router.php
chmod 644 includes/config.php

# Vérifier les logs PHP
tail -50 /var/log/php8.1-fpm.log
```

### GitHub Actions ne déploie pas

- Vérifiez les secrets GitHub
- Testez la connexion SFTP manuellement
- Vérifiez les logs dans GitHub → Actions

