# 🎥 Correction : Vidéo Ne Se Lance Pas

## 🔍 Problème

La vidéo de la page d'accueil ne se lance pas, seule l'image statique s'affiche.

---

## ✅ Solution : Ajouter Support Vidéo dans Nginx

### Étape 1 : Vérifier que le Fichier Vidéo Existe

**Sur le VPS**, exécutez :

```bash
# Vérifier que le fichier vidéo existe
ls -lh /var/www/leadgentax.au/static/videos/LeadGenTax.mov

# Vérifier les permissions
ls -la /var/www/leadgentax.au/static/videos/
```

**Résultat attendu** : Le fichier doit exister et être lisible.

**Si le fichier n'existe pas** :
```bash
# Vérifier si le dossier existe
ls -la /var/www/leadgentax.au/static/

# Si le dossier videos n'existe pas, le créer
mkdir -p /var/www/leadgentax.au/static/videos
chown -R www-data:www-data /var/www/leadgentax.au/static/videos
```

---

### Étape 2 : Modifier la Configuration Nginx

**Sur le VPS**, modifiez la configuration Nginx :

```bash
# Éditer la configuration
nano /etc/nginx/sites-available/leadgentax.com.au
```

**Ajoutez/modifiez** la section pour les fichiers statiques :

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
    
    # Fichiers vidéo avec types MIME corrects
    location ~* \.(mov|mp4|webm|ogg)$ {
        add_header Content-Type video/quicktime;
        add_header Accept-Ranges bytes;
        expires 1y;
        add_header Cache-Control "public, immutable";
        # Permettre la lecture par range requests (important pour les vidéos)
        add_header Access-Control-Allow-Origin *;
    }
    
    # Fichiers statiques (images, CSS, JS)
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
    
    # Router PHP pour les URLs propres
    location / {
        try_files $uri $uri/ /router.php?$query_string;
    }
    
    # Sécurité
    location ~ /\. {
        deny all;
    }
}
```

**Sauvegarder** : `Ctrl+X`, puis `Y`, puis `Entrée`

---

### Étape 3 : Tester et Recharger Nginx

```bash
# Tester la configuration
nginx -t

# Si OK, recharger
systemctl reload nginx
```

---

### Étape 4 : Vérifier les Types MIME dans Nginx

**Si ça ne fonctionne toujours pas**, ajoutez les types MIME dans la configuration principale :

```bash
# Éditer la configuration principale
nano /etc/nginx/mime.types
```

**Vérifiez que ces lignes existent** :

```
video/quicktime          mov;
video/mp4                mp4;
video/webm               webm;
video/ogg                 ogv;
```

**Si elles n'existent pas**, ajoutez-les.

**Puis recharger** :
```bash
systemctl reload nginx
```

---

## 🔍 Diagnostic

### Vérifier que la Vidéo est Accessible

**Sur le VPS**, testez :

```bash
# Tester l'accès direct à la vidéo
curl -I http://localhost/static/videos/LeadGenTax.mov

# Vérifier le type MIME retourné
curl -I http://localhost/static/videos/LeadGenTax.mov | grep Content-Type
```

**Résultat attendu** : `Content-Type: video/quicktime`

---

### Vérifier les Logs Nginx

**Si la vidéo ne se charge toujours pas** :

```bash
# Logs d'erreur
tail -f /var/log/nginx/leadgentax.com.au.error.log

# Logs d'accès
tail -f /var/log/nginx/leadgentax.com.au.access.log
```

**Cherchez** des erreurs 404 ou des problèmes de permissions.

---

## 🔧 Solution Alternative : Convertir en MP4

**Si le format .mov pose problème**, convertissez la vidéo en MP4 :

### Sur votre Mac

```bash
# Installer ffmpeg si nécessaire
brew install ffmpeg

# Convertir la vidéo
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP/static/videos
ffmpeg -i LeadGenTax.mov -c:v libx264 -c:a aac -preset slow -crf 22 LeadGenTax.mp4
```

**Puis** modifiez `index.php` :

```php
<video id="hero-video" autoplay muted loop playsinline style="...">
    <source src="/static/videos/LeadGenTax.mp4" type="video/mp4">
    <source src="/static/videos/LeadGenTax.mov" type="video/quicktime">
</video>
```

**Puis poussez sur GitHub** :
```bash
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
git add static/videos/LeadGenTax.mp4 index.php
git commit -m "Ajout version MP4 de la vidéo hero"
git push origin main
```

---

## ✅ Vérification Finale

1. **Ouvrez** `http://leadgentax.com.au`
2. **Ouvrez la console du navigateur** (F12 → Console)
3. **Vérifiez** s'il y a des erreurs liées à la vidéo
4. **Testez l'accès direct** : `http://leadgentax.com.au/static/videos/LeadGenTax.mov`

**Si la vidéo se charge directement** mais pas dans la page, c'est un problème JavaScript.

**Si la vidéo ne se charge pas du tout**, c'est un problème Nginx ou de fichier manquant.

---

## 🆘 Dépannage Avancé

### Vérifier les Permissions

```bash
# Vérifier les permissions du fichier vidéo
ls -la /var/www/leadgentax.au/static/videos/LeadGenTax.mov

# Si nécessaire, corriger
chmod 644 /var/www/leadgentax.au/static/videos/LeadGenTax.mov
chown www-data:www-data /var/www/leadgentax.au/static/videos/LeadGenTax.mov
```

### Vérifier la Taille du Fichier

```bash
# Vérifier la taille
ls -lh /var/www/leadgentax.au/static/videos/LeadGenTax.mov
```

**Si le fichier est très gros (>50MB)**, cela peut causer des problèmes de chargement. Considérez la compression.

---

## 📋 Checklist

- [ ] Fichier vidéo existe dans `/var/www/leadgentax.au/static/videos/`
- [ ] Permissions correctes (644, www-data:www-data)
- [ ] Configuration Nginx mise à jour (support vidéo)
- [ ] Types MIME configurés dans Nginx
- [ ] Nginx rechargé
- [ ] Test d'accès direct à la vidéo
- [ ] Vérification des logs d'erreur

---

**Dernière mise à jour** : 2025-11-17

