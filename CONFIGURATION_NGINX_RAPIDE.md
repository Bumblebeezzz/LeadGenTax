# ⚡ Configuration Nginx Rapide pour leadgentax.com.au

## ✅ État Actuel

- ✅ DNS propagé : `leadgentax.com.au` → `91.108.105.32`
- ✅ Nginx actif et fonctionnel
- ✅ Site déployé : `/var/www/leadgentax.au/`

---

## 🔧 Configuration Nginx - Étapes

### Étape 1 : Créer la Configuration

**Sur le VPS** (via hPanel terminal ou SSH), exécutez :

```bash
# Créer le fichier de configuration
nano /etc/nginx/sites-available/leadgentax.com.au
```

### Étape 2 : Coller cette Configuration

**Collez exactement ceci** :

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
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
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

---

### Étape 3 : Vérifier la Version PHP

**Avant de continuer**, vérifiez quelle version de PHP est installée :

```bash
# Vérifier les versions PHP disponibles
ls -la /var/run/php/

# Ou
systemctl list-units | grep php
```

**Si vous voyez** :
- `php8.1-fpm.sock` → Utilisez `php8.1-fpm.sock` dans la config
- `php8.2-fpm.sock` → Changez `php8.1-fpm.sock` en `php8.2-fpm.sock`
- `php8.0-fpm.sock` → Changez `php8.1-fpm.sock` en `php8.0-fpm.sock`

**Si vous n'êtes pas sûr**, utilisez cette commande pour trouver :

```bash
# Trouver le socket PHP-FPM
find /var/run/php/ -name "*.sock" 2>/dev/null
```

**Notez le nom exact** et ajustez la configuration si nécessaire.

---

### Étape 4 : Activer le Site

```bash
# Créer le lien symbolique
ln -s /etc/nginx/sites-available/leadgentax.com.au /etc/nginx/sites-enabled/

# Tester la configuration
nginx -t
```

**Si vous voyez** :
```
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful
```

✅ **C'est bon !** Continuez.

**Si vous voyez une erreur** :
- Vérifiez la version PHP (étape 3)
- Vérifiez que le fichier est bien sauvegardé
- Vérifiez les logs : `tail -f /var/log/nginx/error.log`

### Étape 5 : Recharger Nginx

```bash
# Recharger Nginx
systemctl reload nginx

# Vérifier le statut
systemctl status nginx
```

**Doit être** : `active (running)`

---

## ✅ Test du Site

### 1. Tester en HTTP

**Ouvrez dans votre navigateur** :
- `http://leadgentax.com.au`
- `http://www.leadgentax.com.au`

**Résultat attendu** : Le site s'affiche ✅

### 2. Vérifier les Logs

**Si le site ne s'affiche pas**, vérifiez les logs :

```bash
# Logs d'erreur
tail -f /var/log/nginx/leadgentax.com.au.error.log

# Logs d'accès
tail -f /var/log/nginx/leadgentax.com.au.access.log
```

---

## 🔒 Prochaine Étape : Installer SSL

Une fois que le site fonctionne en HTTP, installez SSL :

### Via hPanel (Recommandé)

1. **hPanel** → **VPS** → **Manage** → **SSL**
2. **Sélectionnez** `leadgentax.com.au`
3. **Cliquez sur** "Activate Let's Encrypt SSL"
4. **Cochez** "Auto-renewal" et "Include www subdomain"
5. **Cliquez sur** "Activate"

**Attendez 2-5 minutes** pour l'activation.

### Vérifier SSL

**Ouvrez** : `https://leadgentax.com.au`

**Résultat attendu** : Site avec cadenas vert ✅

---

## 🆘 Dépannage

### Erreur 502 Bad Gateway

**Cause** : PHP-FPM n'est pas démarré ou mauvais socket

**Solution** :
```bash
# Vérifier PHP-FPM
systemctl status php8.1-fpm  # Ajustez la version

# Si pas actif, démarrer
systemctl start php8.1-fpm
systemctl enable php8.1-fpm

# Vérifier le socket
ls -la /var/run/php/php8.1-fpm.sock
```

**Si le socket n'existe pas**, trouvez le bon :
```bash
find /var/run/php/ -name "*.sock"
```

**Puis modifiez** `/etc/nginx/sites-available/leadgentax.com.au` avec le bon socket.

### Erreur 403 Forbidden

**Cause** : Problème de permissions

**Solution** :
```bash
# Vérifier les permissions
ls -la /var/www/leadgentax.au/

# Corriger si nécessaire
chown -R www-data:www-data /var/www/leadgentax.au/
chmod -R 755 /var/www/leadgentax.au/
chmod 755 /var/www/leadgentax.au/router.php
chmod 755 /var/www/leadgentax.au/index.php
```

### Erreur 404 Not Found

**Cause** : Mauvais chemin ou router.php non trouvé

**Solution** :
```bash
# Vérifier que router.php existe
ls -la /var/www/leadgentax.au/router.php

# Vérifier les permissions
chmod 755 /var/www/leadgentax.au/router.php
```

### Le Site Affiche "Welcome to nginx"

**Cause** : Nginx utilise la configuration par défaut

**Solution** :
```bash
# Vérifier que votre site est activé
ls -la /etc/nginx/sites-enabled/ | grep leadgentax

# Si pas là, activer
ln -s /etc/nginx/sites-available/leadgentax.com.au /etc/nginx/sites-enabled/

# Désactiver le site par défaut (optionnel)
rm /etc/nginx/sites-enabled/default

# Recharger
systemctl reload nginx
```

---

## 📋 Checklist

- [ ] Configuration Nginx créée (`/etc/nginx/sites-available/leadgentax.com.au`)
- [ ] Version PHP vérifiée et socket correct
- [ ] Site activé (`ln -s`)
- [ ] Configuration testée (`nginx -t`)
- [ ] Nginx rechargé (`systemctl reload nginx`)
- [ ] Site accessible en HTTP
- [ ] SSL installé (Let's Encrypt)
- [ ] Site accessible en HTTPS

---

## 🎉 Résultat Final

Une fois tout configuré :
- ✅ `http://leadgentax.com.au` → Redirige vers HTTPS
- ✅ `https://leadgentax.com.au` → Site avec cadenas vert
- ✅ `https://www.leadgentax.com.au` → Fonctionne aussi

---

**Dernière mise à jour** : 2025-11-17

