# 🔧 Configuration du Web Server - Étapes Finales

## ✅ Installation Réussie !

LeadGenTax est installé dans : `/var/www/leadgentax.au/`

---

## 🎯 Prochaines Étapes

### Étape 1 : Vérifier Quel Web Server Est Installé

Dans le terminal hPanel, exécutez :

```bash
# Vérifier Nginx
nginx -v 2>/dev/null && echo "✅ Nginx installé" || echo "❌ Nginx non installé"

# Vérifier Apache
apache2 -v 2>/dev/null && echo "✅ Apache installé" || echo "❌ Apache non installé"
```

---

## 🔧 Configuration Nginx (si Nginx est installé)

### Créer la Configuration

```bash
nano /etc/nginx/sites-available/leadgentax.au
```

**Collez cette configuration :**

```nginx
server {
    listen 80;
    server_name leadgentax.au www.leadgentax.au;
    root /var/www/leadgentax.au;
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

**Sauvegarder** : `Ctrl+X`, puis `Y`, puis `Entrée`

### Activer le Site

```bash
# Créer le lien symbolique
ln -s /etc/nginx/sites-available/leadgentax.au /etc/nginx/sites-enabled/

# Tester la configuration
nginx -t

# Recharger Nginx
systemctl reload nginx
```

---

## 🔧 Configuration Apache (si Apache est installé)

### Créer la Configuration

```bash
nano /etc/apache2/sites-available/leadgentax.au.conf
```

**Collez cette configuration :**

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
    
    ErrorLog ${APACHE_LOG_DIR}/leadgentax_error.log
    CustomLog ${APACHE_LOG_DIR}/leadgentax_access.log combined
</VirtualHost>
```

**Sauvegarder** : `Ctrl+X`, puis `Y`, puis `Entrée`

### Activer le Site

```bash
# Activer le site
a2ensite leadgentax.au.conf

# Activer mod_rewrite (si pas déjà activé)
a2enmod rewrite

# Tester la configuration
apache2ctl configtest

# Recharger Apache
systemctl reload apache2
```

---

## 🌐 Configuration du Domaine dans hPanel

1. **hPanel** → **Domains** → **Add Domain**
2. **Domain** : `leadgentax.au`
3. **Document Root** : `/var/www/leadgentax.au`
4. Cliquez sur **Add Domain**

---

## 🔒 Activer SSL (Let's Encrypt)

### Via hPanel (Plus Simple)

1. **hPanel** → **VPS** → **Manage** → **SSL**
2. Sélectionnez `leadgentax.au`
3. Cliquez sur **Activate Let's Encrypt SSL**
4. Cochez **Auto-renewal**

### Via Terminal

```bash
# Installer Certbot (si pas déjà installé)
apt update
apt install -y certbot python3-certbot-nginx
# ou pour Apache
apt install -y certbot python3-certbot-apache

# Générer le certificat
certbot --nginx -d leadgentax.au -d www.leadgentax.au
# ou pour Apache
certbot --apache -d leadgentax.au -d www.leadgentax.au
```

---

## ✅ Vérification Finale

### 1. Tester le Site

```bash
# Vérifier que le serveur répond
curl -I http://localhost
```

### 2. Vérifier les Permissions

```bash
ls -la /var/www/leadgentax.au/
# Vérifier que router.php et index.php sont exécutables (755)
```

### 3. Vérifier les Logs

```bash
# Nginx
tail -f /var/log/nginx/error.log

# Apache
tail -f /var/log/apache2/error.log
```

---

## 🎉 C'est Terminé !

Une fois configuré, visitez : `https://leadgentax.au`

---

## 🆘 Dépannage

### Le site ne charge pas

1. Vérifiez les logs d'erreur (voir ci-dessus)
2. Vérifiez que le web server est actif : `systemctl status nginx` ou `systemctl status apache2`
3. Vérifiez les permissions : `chmod 755 router.php index.php`

### Erreur 404

- Vérifiez que la configuration pointe vers `/var/www/leadgentax.au`
- Vérifiez que `router.php` est exécutable

### Erreur 500

- Vérifiez les logs d'erreur
- Vérifiez que PHP-FPM est actif : `systemctl status php8.1-fpm`

