# 🚀 Installation Ultra-Simple - LeadGenTax

## ✅ Solution Automatique

J'ai créé un système de déploiement automatique qui fait tout pour vous. **Aucune manipulation manuelle nécessaire !**

---

## 🎯 Option 1 : Déploiement Automatique via GitHub (RECOMMANDÉ)

### Étape 1 : Configurer les Secrets GitHub (1 fois seulement)

1. Allez sur : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Cliquez sur **"New repository secret"**
3. Ajoutez ces 2 secrets :

**Secret 1 : HOSTINGER_VPS_IP**
- Name: `HOSTINGER_VPS_IP`
- Value: `91.108.105.32`
- Cliquez sur **"Add secret"**

**Secret 2 : HOSTINGER_SSH_PRIVATE_KEY**
- Name: `HOSTINGER_SSH_PRIVATE_KEY`
- Value: Votre clé SSH privée (voir ci-dessous)

### Étape 2 : Générer une Clé SSH (si vous n'en avez pas)

**Sur votre Mac :**
```bash
ssh-keygen -t rsa -b 4096 -C "leadgentax@github" -f ~/.ssh/leadgentax_hostinger
```

**Copier la clé publique sur le VPS :**
```bash
ssh-copy-id -i ~/.ssh/leadgentax_hostinger.pub root@91.108.105.32
```

**Copier la clé privée pour GitHub :**
```bash
cat ~/.ssh/leadgentax_hostinger
# Copiez tout le contenu (de -----BEGIN OPENSSH PRIVATE KEY----- jusqu'à -----END OPENSSH PRIVATE KEY-----)
# Collez-le dans le secret GitHub HOSTINGER_SSH_PRIVATE_KEY
```

### Étape 3 : C'est Tout ! 🎉

**À chaque fois que vous poussez sur GitHub, le site se met à jour automatiquement !**

```bash
git add .
git commit -m "Mise à jour"
git push origin main
```

Le workflow GitHub Actions va :
- ✅ Se connecter au VPS
- ✅ Installer/mettre à jour LeadGenTax dans `/root/domains/leadgentax.au/public_html/`
- ✅ Configurer les permissions
- ✅ **S'assurer qu'il n'y a pas de conflit avec tradeasy** (vérification automatique)

---

## 🎯 Option 2 : Installation Manuelle (1 seule fois)

Si vous préférez installer manuellement une fois, puis utiliser GitHub Actions pour les mises à jour :

### Sur votre Mac, exécutez :

```bash
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
chmod +x deploy-auto.sh
./deploy-auto.sh
```

**C'est tout !** Le script fait tout automatiquement :
- ✅ Se connecte au VPS
- ✅ Installe LeadGenTax dans un répertoire isolé
- ✅ Vérifie qu'il n'y a pas de conflit avec tradeasy
- ✅ Configure les permissions

---

## 🔒 Protection Anti-Conflit

Le script vérifie automatiquement :
- ✅ Que le répertoire `/root/domains/leadgentax.au/public_html/` est isolé
- ✅ Qu'il n'y a pas de conflit avec tradeasy ou d'autres sites
- ✅ Que chaque site est dans son propre répertoire

**Structure garantie :**
```
/root/domains/
├── tradeasy.me/              ← Site existant (isolé)
│   └── public_html/
├── earthstralia.com/         ← Site existant (isolé)
│   └── public_html/
└── leadgentax.au/            ← NOUVEAU SITE (isolé)
    └── public_html/
```

**✅ Aucun conflit possible !**

---

## 📋 Après l'Installation

### 1. Configurer le Domaine (si pas déjà fait)

Dans hPanel :
- **Domains** → **Add Domain** → `leadgentax.au`
- **Document Root** : `/root/domains/leadgentax.au/public_html/`

### 2. Activer SSL

Dans hPanel :
- **VPS** → **Manage** → **SSL** → Activer Let's Encrypt pour `leadgentax.au`

### 3. Configurer config.php

Le fichier est déjà créé, il suffit de modifier :
- `GA4_MEASUREMENT_ID` (optionnel)
- Autres configurations si nécessaire

---

## 🆘 Problèmes ?

### Le déploiement GitHub ne fonctionne pas

1. Vérifiez les secrets GitHub (noms exacts)
2. Vérifiez que la clé SSH est correcte
3. Regardez les logs dans **GitHub** → **Actions**

### Le site ne charge pas

1. Vérifiez que le domaine est configuré dans hPanel
2. Vérifiez les permissions : `chmod 755 router.php`
3. Vérifiez les logs : `tail -f /var/log/nginx/error.log`

---

## ✅ C'est Tout !

**Avec cette solution, vous n'avez plus qu'à :**
1. Configurer les secrets GitHub (1 fois)
2. Pousser votre code sur GitHub
3. Le site se met à jour automatiquement !

**Aucune manipulation manuelle nécessaire après la configuration initiale !** 🎉

