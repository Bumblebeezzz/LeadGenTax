# 🔍 Audit Hostinger - Résultats Basés sur le Dashboard

## ✅ Informations Détectées depuis le Dashboard

### 1. Type de Compte
- ✅ **Cloud Hosting** : Premium Web Hosting (2 websites) + Business Web Hosting (3 websites)
- ✅ **VPS** : 2 instances VPS actives (KVM 2)
  - `srv495690.hstgr.cloud` - IP: `89.116.134.53` (expire 2025-12-21)
  - `srv508687.hstgr.cloud` - IP: `91.108.105.32` (expire 2026-04-14)

**🎯 Recommandation** : Utiliser une des instances VPS pour LeadGenTax (plus de flexibilité)

---

### 2. Domaines Existants

| Domaine | Expiration | Utilisation Probable |
|---------|------------|---------------------|
| `earthstralia.com` | 2027-05-18 | Site existant (Earthstralia) |
| `echomeridian.com` | 2026-09-24 | Site existant |
| `tradeasy.me` | 2026-10-23 | Site existant |
| `tradeasy.support` | 2026-03-19 | Site existant |

**⚠️ Important** : `earthstralia.com` est déjà configuré et actif. Il faut s'assurer que LeadGenTax est bien séparé.

---

### 3. Sites Existants Identifiés

- ✅ **Earthstralia** : `earthstralia.com` (confirmé par emails et domaines)
- ⚠️ **Autres sites** : `echomeridian.com`, `tradeasy.me`, `tradeasy.support`

**🎯 Plan d'Action** : Installer LeadGenTax dans un répertoire séparé sur le VPS

---

## 📋 Informations à Collecter (Manuellement)

### Étape 1 : Accéder au VPS

1. Dans hPanel, cliquez sur **VPS** → **Manage** sur une des instances
2. Notez les informations suivantes :

#### Pour `srv495690.hstgr.cloud` ou `srv508687.hstgr.cloud` :

- [ ] **Répertoire racine** : `/home/username/` ou `/var/www/` ?
- [ ] **Structure des sites existants** :
  - Où est installé `earthstralia.com` ? `/home/username/domains/earthstralia.com/public_html/` ?
  - Où sont les autres sites ?

**Comment trouver** :
1. Cliquez sur **VPS** → **Manage** → **File Manager**
2. Naviguez dans la structure de dossiers
3. Notez où sont les sites existants

---

### Étape 2 : Vérifier la Structure des Répertoires

Sur le VPS, la structure typique est :
```
/home/username/
├── domains/
│   ├── earthstralia.com/
│   │   └── public_html/          ← Site Earthstralia
│   ├── echomeridian.com/
│   │   └── public_html/
│   └── tradeasy.me/
│       └── public_html/
```

**🎯 Plan** : Créer `/home/username/domains/leadgentax.au/public_html/` (ou similaire)

---

### Étape 3 : Accès FTP/SFTP

1. Dans hPanel, allez dans **VPS** → **Manage** → **FTP Accounts**
2. Notez :
   - [ ] **Host FTP** : `ftp.leadgentax.au` ou IP du VPS ?
   - [ ] **Port** : 21 (FTP) ou 22 (SFTP) ?
   - [ ] **Username** : Créer un compte FTP séparé pour LeadGenTax
   - [ ] **Password** : Générer un mot de passe fort

**Recommandation** : Créer un compte FTP dédié :
- Username : `leadgentax` ou `leadgentax@leadgentax.au`
- Directory : `/home/username/domains/leadgentax.au/public_html/`

---

### Étape 4 : Configuration PHP

1. Dans hPanel, allez dans **VPS** → **Manage** → **PHP Configuration**
2. Vérifiez :
   - [ ] **Version PHP disponible** : 7.4 / 8.0 / 8.1 / 8.2 / 8.3
   - [ ] **Extensions activées** :
     - [ ] curl
     - [ ] openssl
     - [ ] mbstring
     - [ ] json
     - [ ] fileinfo

---

### Étape 5 : Ajouter le Domaine LeadGenTax

#### Option A : Si vous avez un domaine `leadgentax.au`

1. Dans hPanel, allez dans **Domains** → **Add Domain** (ou **Addon Domain**)
2. Ajoutez : `leadgentax.au`
3. **Document Root** : `/home/username/domains/leadgentax.au/public_html/`
4. Cliquez sur **Add Domain**

#### Option B : Si vous n'avez pas encore le domaine

1. Achetez `leadgentax.au` via Hostinger ou un autre registrar
2. Configurez les DNS pour pointer vers votre VPS
3. Ajoutez le domaine dans hPanel comme ci-dessus

#### Option C : Utiliser un sous-domaine (temporaire)

1. Créez un sous-domaine : `leadgentax.earthstralia.com`
2. **Document Root** : `/home/username/domains/earthstralia.com/public_html/leadgentax/`
3. ⚠️ **Note** : Moins idéal car partage le même domaine

---

### Étape 6 : SSL/HTTPS

1. Dans hPanel, allez dans **VPS** → **Manage** → **SSL**
2. Pour `leadgentax.au` :
   - [ ] Activez **Let's Encrypt SSL** (gratuit)
   - [ ] Activez **Auto-renewal**

---

## 🎯 Plan d'Installation Recommandé

### Structure Cible sur VPS

```
/home/username/domains/
├── earthstralia.com/
│   └── public_html/              ← Site existant (isolé)
│       ├── index.php
│       └── .htaccess
│
├── echomeridian.com/
│   └── public_html/              ← Site existant (isolé)
│
├── tradeasy.me/
│   └── public_html/              ← Site existant (isolé)
│
└── leadgentax.au/                 ← NOUVEAU SITE (isolé)
    └── public_html/
        ├── index.php
        ├── router.php
        ├── .htaccess
        ├── includes/
        ├── templates/
        └── static/
```

**✅ Aucun conflit** : Chaque site dans son propre répertoire

---

## 🔧 Configuration GitHub Actions

### Secrets à Ajouter dans GitHub

Une fois que vous avez collecté les informations FTP :

1. Allez sur : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Ajoutez :

| Secret Name | Valeur à Remplir |
|------------|------------------|
| `HOSTINGER_FTP_HOST` | `ftp.leadgentax.au` ou IP du VPS |
| `HOSTINGER_FTP_USER` | `leadgentax` (ou le username FTP créé) |
| `HOSTINGER_FTP_PASSWORD` | Le mot de passe FTP |

---

## 📝 Checklist d'Action Immédiate

### À Faire Maintenant :

1. [ ] **Accéder au VPS** : hPanel → VPS → Manage → `srv508687.hstgr.cloud` (celui qui expire le plus tard)
2. [ ] **Vérifier la structure** : File Manager → Voir où sont les sites existants
3. [ ] **Créer le répertoire** : `/home/username/domains/leadgentax.au/public_html/`
4. [ ] **Créer compte FTP** : VPS → FTP Accounts → Créer un compte pour LeadGenTax
5. [ ] **Ajouter le domaine** : Domains → Add Domain → `leadgentax.au`
6. [ ] **Configurer PHP** : VPS → PHP Configuration → PHP 8.1+
7. [ ] **Activer SSL** : VPS → SSL → Let's Encrypt pour `leadgentax.au`
8. [ ] **Configurer GitHub Secrets** : Avec les identifiants FTP collectés

---

## 🆘 Questions à Résoudre

### 1. Quel VPS utiliser ?
- **Recommandation** : `srv508687.hstgr.cloud` (expire 2026-04-14, plus récent)
- Vérifiez l'espace disponible et la charge

### 2. Où est installé Earthstralia ?
- Il faut vérifier le répertoire exact pour éviter les conflits
- Probablement : `/home/username/domains/earthstralia.com/public_html/`

### 3. Avez-vous le domaine `leadgentax.au` ?
- Si oui : Ajoutez-le comme Addon Domain
- Si non : Achetez-le ou utilisez un sous-domaine temporaire

---

## 🚀 Prochaines Étapes

Une fois que vous avez collecté toutes les informations :

1. Suivez le guide : `HOSTINGER_INSTALLATION_GUIDE.md`
2. Utilisez les informations collectées pour configurer GitHub Actions
3. Testez le déploiement automatique

---

## 📞 Support

Si vous avez besoin d'aide pour collecter ces informations :
1. Prenez des captures d'écran de la structure des répertoires
2. Partagez-les et je pourrai vous guider plus précisément

