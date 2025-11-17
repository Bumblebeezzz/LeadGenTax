# 🚀 Déploiement Automatique - LeadGenTax

## ✅ Solution Simplifiée

**Tout est automatisé !** Vous n'avez plus qu'à configurer une fois, puis chaque push sur GitHub met à jour le site automatiquement.

---

## 🎯 Méthode Recommandée : GitHub Actions avec SSH

### Configuration Initiale (1 fois seulement)

#### 1. Générer une Clé SSH

Sur votre Mac, ouvrez Terminal et exécutez :

```bash
ssh-keygen -t rsa -b 4096 -C "leadgentax@github" -f ~/.ssh/leadgentax_hostinger
```

**Appuyez sur Entrée** pour accepter l'emplacement par défaut et **laissez le mot de passe vide** (ou créez-en un si vous préférez).

#### 2. Copier la Clé Publique sur le VPS

```bash
ssh-copy-id -i ~/.ssh/leadgentax_hostinger.pub root@91.108.105.32
```

Entrez le mot de passe root du VPS quand demandé.

#### 3. Ajouter les Secrets GitHub

1. Allez sur : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Cliquez sur **"New repository secret"** et ajoutez :

**Secret 1 : HOSTINGER_VPS_IP**
```
Name: HOSTINGER_VPS_IP
Value: 91.108.105.32
```

**Secret 2 : HOSTINGER_SSH_PRIVATE_KEY**
```bash
# Sur votre Mac, exécutez :
cat ~/.ssh/leadgentax_hostinger

# Copiez TOUT le contenu (de -----BEGIN jusqu'à -----END)
# Collez-le dans le secret GitHub
```

---

## 🎉 C'est Tout !

**Maintenant, à chaque fois que vous faites :**

```bash
git add .
git commit -m "Mise à jour"
git push origin main
```

**Le site se met à jour automatiquement sur le VPS !** ✨

---

## 🔒 Protection Anti-Conflit

Le système vérifie automatiquement :
- ✅ Que LeadGenTax est installé dans `/root/domains/leadgentax.au/public_html/`
- ✅ Qu'il n'y a **AUCUN conflit** avec tradeasy ou d'autres sites
- ✅ Que chaque site est dans son propre répertoire isolé

**Structure garantie :**
```
/root/domains/
├── tradeasy.me/              ← Isolé
├── earthstralia.com/         ← Isolé
└── leadgentax.au/            ← Isolé (votre nouveau site)
```

---

## 📋 Après le Premier Déploiement

### 1. Configurer le Domaine

Dans hPanel Hostinger :
- **Domains** → **Add Domain** → `leadgentax.au`
- **Document Root** : `/root/domains/leadgentax.au/public_html/`

### 2. Activer SSL

Dans hPanel :
- **VPS** → **Manage** → **SSL** → Activer Let's Encrypt pour `leadgentax.au`

### 3. Tester

Visitez : `https://leadgentax.au`

---

## 🆘 Alternative : Méthode FTP (Plus Simple mais Moins Sécurisée)

Si vous préférez utiliser FTP au lieu de SSH :

1. **GitHub** → **Settings** → **Secrets and variables** → **Actions**
2. Ajoutez :
   - `HOSTINGER_FTP_HOST` : `91.108.105.32`
   - `HOSTINGER_FTP_USER` : `root`
   - `HOSTINGER_FTP_PASSWORD` : Votre mot de passe root

Le workflow `.github/workflows/deploy-hostinger.yml` s'occupera du reste.

---

## ✅ Résumé

**Avec cette solution :**
- ✅ **Installation automatique** la première fois
- ✅ **Mises à jour automatiques** à chaque push GitHub
- ✅ **Protection anti-conflit** avec tradeasy et autres sites
- ✅ **Aucune manipulation manuelle** après la configuration initiale

**Temps de configuration : 5 minutes**
**Temps de déploiement : Automatique !** 🚀

