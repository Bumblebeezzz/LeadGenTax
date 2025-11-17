# 🔑 Étapes Finales - Configuration SSH

## ✅ Clé SSH Générée sur Mac

Votre clé est dans : `/Users/osiris/.ssh/leadgentax_hostinger`

---

## 📤 Étape 1 : Copier la Clé Publique sur le VPS

**Sur votre Mac** (dans Terminal), exécutez :

```bash
ssh-copy-id -i ~/.ssh/leadgentax_hostinger.pub root@91.108.105.32
```

**Quand il demande "Are you sure you want to continue connecting?"** → Tapez `yes` et appuyez sur Entrée.

**Quand il demande le mot de passe** → Entrez le mot de passe root du VPS.

---

## ✅ Étape 2 : Tester la Connexion (Sans Mot de Passe)

```bash
ssh -i ~/.ssh/leadgentax_hostinger root@91.108.105.32
```

Si ça se connecte **sans demander de mot de passe**, c'est bon ! ✅

---

## 🔐 Étape 3 : Ajouter les Secrets GitHub

### 3.1 : Récupérer la Clé Privée

**Sur votre Mac**, exécutez :

```bash
cat ~/.ssh/leadgentax_hostinger
```

**Copiez TOUT le contenu** (de `-----BEGIN OPENSSH PRIVATE KEY-----` jusqu'à `-----END OPENSSH PRIVATE KEY-----`)

### 3.2 : Ajouter dans GitHub

1. **Allez sur** : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Cliquez sur **"New repository secret"**

**Secret 1 : HOSTINGER_VPS_IP**
```
Name: HOSTINGER_VPS_IP
Value: 91.108.105.32
```

**Secret 2 : HOSTINGER_SSH_PRIVATE_KEY**
```
Name: HOSTINGER_SSH_PRIVATE_KEY
Value: [Collez ici TOUT le contenu de la clé privée]
```

---

## 🎉 Test du Déploiement

Une fois les secrets ajoutés, testez :

```bash
# Sur votre Mac
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
echo "# Test déploiement" >> README.md
git add .
git commit -m "Test déploiement automatique"
git push origin main
```

**Vérifiez dans GitHub** → **Actions** → Le workflow devrait s'exécuter automatiquement !

---

## ✅ Vérification

1. **GitHub Actions** : https://github.com/Bumblebeezzz/LeadGenTax/actions
2. Cliquez sur le dernier workflow
3. Vérifiez que toutes les étapes sont vertes ✅

---

## 🆘 Si ssh-copy-id Ne Fonctionne Pas

**Alternative manuelle** :

```bash
# Sur votre Mac, afficher la clé publique
cat ~/.ssh/leadgentax_hostinger.pub

# Copiez le contenu, puis sur le VPS :
ssh root@91.108.105.32
mkdir -p ~/.ssh
echo "[Collez ici la clé publique]" >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
exit
```

---

## 🎯 Résultat Final

Une fois configuré :
- ✅ **Push sur GitHub** → **Déploiement automatique** sur le VPS
- ✅ **Aucune manipulation manuelle**
- ✅ **Mises à jour en quelques secondes**

