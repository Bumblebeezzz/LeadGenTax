# 🔍 Checklist d'Audit Hostinger - Avant Installation

## Informations à Collecter

### 1. Type de Compte Hostinger
- [ ] **Cloud Hosting** (limité en sites)
- [ ] **VPS** (plus de flexibilité)
- [ ] **Dedicated Server**

**Où trouver** : hPanel → Hosting → Overview

---

### 2. Sites Existants

#### Site 1 (existant)
- [ ] **Nom du domaine** : _______________________
- [ ] **Répertoire** : `/public_html/___________/`
- [ ] **Type** : WordPress / PHP custom / Autre : ___________
- [ ] **PHP Version** : ___________

**Où trouver** : hPanel → Domains → Votre domaine

---

### 3. Espace Disponible

- [ ] **Espace total** : __________ GB
- [ ] **Espace utilisé** : __________ GB
- [ ] **Espace disponible** : __________ GB

**Où trouver** : hPanel → Hosting → Overview → Disk Usage

**Recommandation** : LeadGenTax nécessite ~50-100 MB (sans vidéo), ~200-500 MB (avec vidéo)

---

### 4. Configuration PHP

- [ ] **Version PHP disponible** : 7.4 / 8.0 / 8.1 / 8.2 / 8.3
- [ ] **Extensions activées** :
  - [ ] curl
  - [ ] openssl
  - [ ] mbstring
  - [ ] json
  - [ ] fileinfo

**Où trouver** : hPanel → Advanced → PHP Configuration

---

### 5. Accès FTP/SFTP

#### Compte FTP Principal
- [ ] **Host** : _______________________
- [ ] **Port** : 21 (FTP) / 22 (SFTP)
- [ ] **Username** : _______________________
- [ ] **Password** : _______________________

**Où trouver** : hPanel → Files → FTP Accounts

**⚠️ Recommandation** : Créer un compte FTP séparé pour LeadGenTax

---

### 6. Accès SSH (si disponible)

- [ ] **SSH activé** : Oui / Non
- [ ] **Host** : _______________________
- [ ] **Port** : 22
- [ ] **Username** : _______________________
- [ ] **Méthode d'authentification** : Password / SSH Key

**Où trouver** : hPanel → Advanced → SSH Access

---

### 7. Domaines et Sous-domaines

#### Domaines existants
- [ ] **Domaine principal** : _______________________
- [ ] **Sous-domaines** : _______________________

#### Options pour LeadGenTax
- [ ] **Option A** : Sous-domaine `leadgentax.votredomaine.com`
- [ ] **Option B** : Domaine séparé `leadgentax.au`
- [ ] **Option C** : Répertoire `/votredomaine.com/leadgentax`

**Où trouver** : hPanel → Domains → Subdomains / Addon Domains

---

### 8. SSL/HTTPS

- [ ] **SSL activé pour site existant** : Oui / Non
- [ ] **Type SSL** : Let's Encrypt (gratuit) / Autre
- [ ] **Auto-renewal** : Activé / Désactivé

**Où trouver** : hPanel → SSL → SSL/TLS Status

**⚠️ Important** : Activez SSL pour LeadGenTax aussi (gratuit avec Let's Encrypt)

---

### 9. Base de Données (si nécessaire)

Pour LeadGenTax, **pas de base de données requise**, mais vérifiez :
- [ ] **Nombre de bases de données** : __________
- [ ] **Espace utilisé** : __________ MB
- [ ] **Limite** : __________ bases de données

**Où trouver** : hPanel → Databases → MySQL Databases

---

### 10. Limites et Restrictions

- [ ] **Nombre de sites autorisés** : __________
- [ ] **Limite de bande passante** : __________ GB/mois
- [ ] **Limite de CPU/RAM** : __________

**Où trouver** : hPanel → Hosting → Overview

---

## 📋 Plan d'Action Recommandé

### Si vous avez Cloud Hosting :
1. Vérifiez le nombre de sites autorisés
2. Si limite atteinte, considérez upgrade vers VPS
3. Utilisez un sous-domaine si possible

### Si vous avez VPS :
1. ✅ Plus de flexibilité
2. Créez un répertoire séparé : `/public_html/leadgentax/`
3. Configurez un domaine/sous-domaine dédié

### Configuration Recommandée :
```
/public_html/
├── site1/              (votre site existant)
│   ├── index.php
│   └── .htaccess
│
└── leadgentax/         (nouveau site - isolé)
    ├── index.php
    ├── router.php
    ├── .htaccess
    ├── includes/
    ├── templates/
    └── static/
```

---

## ⚠️ Points d'Attention

1. **Pas de conflit de répertoires** : Chaque site dans son propre dossier
2. **Pas de conflit de .htaccess** : Chaque site a le sien
3. **Pas de conflit de sessions** : Configuré dans `config.php`
4. **Pas de conflit de PHP** : Chaque domaine peut avoir sa propre version PHP

---

## ✅ Après l'Audit

Une fois toutes les informations collectées, vous pouvez :
1. Suivre le guide `HOSTINGER_INSTALLATION_GUIDE.md`
2. Configurer GitHub Actions avec les identifiants FTP
3. Installer le site dans un répertoire séparé

---

## 🆘 Besoin d'Aide ?

Si vous avez des questions ou des doutes :
1. Contactez le support Hostinger
2. Vérifiez la documentation Hostinger
3. Consultez les logs dans hPanel → Advanced → Error Log

