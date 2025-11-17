# 🔒 Installation SSL avec Certbot (Let's Encrypt) - Guide Complet

## 📋 Vue d'Ensemble

Hostinger ne propose pas d'installation SSL automatique pour les VPS via hPanel. Il faut installer SSL manuellement avec **Certbot**.

---

## ✅ Prérequis

- ✅ Domaine `leadgentax.com.au` configuré et propagé
- ✅ Nginx configuré et fonctionnel
- ✅ Site accessible en HTTP : `http://leadgentax.com.au`
- ✅ Accès SSH au VPS

---

## 🔧 Étape 1 : Installer Certbot

**Sur le VPS** (via hPanel terminal ou SSH), exécutez :

```bash
# Mettre à jour les paquets
apt update

# Installer Certbot et le plugin Nginx
apt install -y certbot python3-certbot-nginx
```

**Attendez** que l'installation se termine (1-2 minutes).

---

## 🔧 Étape 2 : Vérifier la Configuration Nginx

**Avant d'installer SSL**, vérifiez que votre configuration Nginx est correcte :

```bash
# Vérifier la configuration
nginx -t
```

**Doit retourner** : `syntax is ok` et `test is successful`

**Si erreur**, corrigez-la avant de continuer.

---

## 🔧 Étape 3 : Installer le Certificat SSL

**Exécutez cette commande** :

```bash
certbot --nginx -d leadgentax.com.au -d www.leadgentax.com.au
```

### Pendant l'Installation, Certbot Vous Demandera :

#### 1. Email Address
```
Enter email address (used for urgent renewal and security notices)
```
**Réponse** : Entrez votre email (ex: `contact@leadgentax.com.au`)

#### 2. Terms of Service
```
(A)gree/(C)ancel: 
```
**Réponse** : Tapez `A` puis `Entrée` (Agree)

#### 3. Share Email with EFF
```
(Y)es/(N)o: 
```
**Réponse** : Tapez `Y` ou `N` selon votre préférence (recommandé : `N`)

#### 4. Redirect HTTP to HTTPS
```
Please choose whether or not to redirect HTTP traffic to HTTPS, removing HTTP access.
-------------------------------------------------------------------------------
1: No redirect - Make no further changes to the webserver configuration.
2: Redirect - Make all requests redirect to secure HTTPS access. 
Select the appropriate number [1-2] then [enter] (press 'c' to cancel):
```
**Réponse** : Tapez `2` puis `Entrée` (Redirect - RECOMMANDÉ)

---

## ✅ Étape 4 : Vérification

### Vérifier que le Certificat est Installé

```bash
# Vérifier les certificats
certbot certificates
```

**Résultat attendu** : Vous devriez voir `leadgentax.com.au` avec une date d'expiration.

### Tester le Site

**Ouvrez dans votre navigateur** :
- `https://leadgentax.com.au` (devrait afficher le site avec cadenas vert ✅)
- `http://leadgentax.com.au` (devrait rediriger vers HTTPS)

---

## 🔄 Étape 5 : Renouvellement Automatique

Certbot configure automatiquement le renouvellement, mais vérifions :

```bash
# Tester le renouvellement (dry-run)
certbot renew --dry-run
```

**Résultat attendu** : `The dry run was successful`

### Vérifier le Timer Systemd

```bash
# Vérifier que le timer est actif
systemctl status certbot.timer
```

**Doit être** : `active (waiting)`

---

## 🔧 Configuration Nginx Après SSL

Certbot modifie automatiquement votre configuration Nginx. Vérifiez :

```bash
# Voir la configuration modifiée
cat /etc/nginx/sites-available/leadgentax.com.au
```

**Certbot ajoute automatiquement** :
- Configuration SSL (port 443)
- Redirection HTTP → HTTPS
- Chemins vers les certificats

---

## 🆘 Dépannage

### Erreur : "Failed to find a virtual host"

**Cause** : Nginx ne trouve pas la configuration pour le domaine

**Solution** :
```bash
# Vérifier que le site est activé
ls -la /etc/nginx/sites-enabled/ | grep leadgentax

# Si pas là, activer
ln -s /etc/nginx/sites-available/leadgentax.com.au /etc/nginx/sites-enabled/

# Recharger Nginx
systemctl reload nginx

# Réessayer Certbot
certbot --nginx -d leadgentax.com.au -d www.leadgentax.com.au
```

### Erreur : "Failed to connect to host"

**Cause** : Le port 80 n'est pas accessible depuis l'extérieur

**Solution** :
```bash
# Vérifier que Nginx écoute sur le port 80
netstat -tuln | grep :80

# Vérifier le firewall
ufw status

# Si le firewall bloque, autoriser HTTP et HTTPS
ufw allow 80/tcp
ufw allow 443/tcp
```

### Erreur : "DNS problem: NXDOMAIN"

**Cause** : Le DNS n'est pas encore propagé

**Solution** :
```bash
# Vérifier le DNS
dig leadgentax.com.au

# Attendre 15-30 minutes pour la propagation
# Puis réessayer Certbot
```

### Le Certificat Ne Fonctionne Pas

**Vérifier les logs** :
```bash
# Logs Certbot
tail -f /var/log/letsencrypt/letsencrypt.log

# Logs Nginx
tail -f /var/log/nginx/leadgentax.com.au.error.log
```

---

## 🔄 Renouvellement Manuel (Si Nécessaire)

**Les certificats Let's Encrypt expirent après 90 jours**, mais Certbot les renouvelle automatiquement.

**Pour renouveler manuellement** :
```bash
certbot renew
```

**Pour forcer le renouvellement** :
```bash
certbot renew --force-renewal
```

---

## 📋 Checklist

- [ ] Certbot installé
- [ ] Configuration Nginx testée (`nginx -t`)
- [ ] Certificat SSL installé (`certbot --nginx`)
- [ ] Site accessible en HTTPS
- [ ] Redirection HTTP → HTTPS active
- [ ] Renouvellement automatique configuré
- [ ] Test de renouvellement réussi (`certbot renew --dry-run`)

---

## ✅ Résultat Final

Une fois installé :
- ✅ `https://leadgentax.com.au` → Site avec cadenas vert
- ✅ `http://leadgentax.com.au` → Redirige vers HTTPS
- ✅ `https://www.leadgentax.com.au` → Fonctionne aussi
- ✅ Renouvellement automatique configuré

---

## 🎉 Félicitations !

Votre site est maintenant **sécurisé avec SSL** ! 🔒

---

**Dernière mise à jour** : 2025-11-17

