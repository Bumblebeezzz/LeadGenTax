# ⚡ Quick Start - Installation LeadGenTax sur Hostinger VPS

## 🎯 Vue d'Ensemble (Basé sur votre Dashboard)

Vous avez :
- ✅ **2 VPS actifs** (KVM 2)
- ✅ **Plusieurs sites existants** (earthstralia.com, etc.)
- ✅ **Cloud Hosting** (Premium + Business)

**Objectif** : Installer LeadGenTax sur le VPS `srv508687.hstgr.cloud` (recommandé)

---

## 🚀 Installation en 5 Étapes

### Étape 1 : Accéder au VPS (2 minutes)

1. **hPanel** → **VPS** → Cliquez sur **Manage** pour `srv508687.hstgr.cloud`
2. **File Manager** → Naviguez vers `/home/username/domains/`
3. **Notez** où est installé `earthstralia.com` (ex: `/home/username/domains/earthstralia.com/public_html/`)

---

### Étape 2 : Créer le Répertoire (1 minute)

1. Dans **File Manager**, créez : `/home/username/domains/leadgentax.au/`
2. Créez le sous-dossier : `public_html/`
3. **Permissions** : 755 pour les dossiers

**Structure** :
```
/home/username/domains/leadgentax.au/public_html/
```

---

### Étape 3 : Ajouter le Domaine (2 minutes)

1. **hPanel** → **Domains** → **Add Domain** (ou **Addon Domain**)
2. **Domain** : `leadgentax.au`
3. **Document Root** : `/home/username/domains/leadgentax.au/public_html/`
4. Cliquez sur **Add Domain**

**⚠️ Si vous n'avez pas encore le domaine** :
- Achetez `leadgentax.au` via Hostinger
- Ou utilisez temporairement : `leadgentax.earthstralia.com` (sous-domaine)

---

### Étape 4 : Créer Compte FTP (2 minutes)

1. **VPS** → **Manage** → **FTP Accounts** → **Create FTP Account**
2. **Username** : `leadgentax`
3. **Directory** : `/home/username/domains/leadgentax.au/public_html/`
4. **Password** : Générer un mot de passe fort
5. **Notez** : Host, Username, Password, Port (21 ou 22)

---

### Étape 5 : Configurer GitHub Actions (3 minutes)

1. **GitHub** → https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. **New repository secret** → Ajoutez :

```
HOSTINGER_FTP_HOST = ftp.leadgentax.au (ou IP du VPS)
HOSTINGER_FTP_USER = leadgentax
HOSTINGER_FTP_PASSWORD = [votre mot de passe FTP]
```

3. **Test** : Faites un petit changement et poussez sur GitHub
4. Vérifiez dans **GitHub** → **Actions** que le déploiement fonctionne

---

## ✅ Vérification

1. **Visitez** : `https://leadgentax.au` (ou votre sous-domaine)
2. **Vérifiez** que toutes les pages fonctionnent :
   - `/` (Home)
   - `/about`
   - `/services`
   - `/contact`

---

## 🔒 Sécurité

1. **SSL** : hPanel → VPS → Manage → SSL → Activer Let's Encrypt pour `leadgentax.au`
2. **Permissions** : Fichiers 644, Dossiers 755
3. **Isolation** : Aucun fichier partagé avec les autres sites

---

## 🐛 Problèmes Courants

### Le site ne charge pas
- Vérifiez les permissions (755/644)
- Vérifiez que `router.php` est exécutable
- Vérifiez les logs : VPS → Manage → Error Log

### GitHub Actions ne déploie pas
- Vérifiez les secrets GitHub (noms exacts)
- Testez la connexion FTP avec FileZilla
- Vérifiez les logs dans GitHub → Actions

---

## 📞 Besoin d'Aide ?

Si vous êtes bloqué à une étape :
1. Prenez une capture d'écran
2. Partagez-la et je vous guiderai

**Temps total estimé** : 10-15 minutes

