# 🔑 Copie Manuelle de la Clé SSH

## ⚠️ Si ssh-copy-id Ne Fonctionne Pas

Utilisez cette méthode alternative :

---

## 📋 Méthode 1 : Via Terminal hPanel (Recommandé)

### Étape 1 : Récupérer la Clé Publique (Sur votre Mac)

```bash
cat ~/.ssh/leadgentax_hostinger.pub
```

**Copiez tout le contenu** (ça ressemble à : `ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAACAQ... leadgentax@github`)

### Étape 2 : Ajouter sur le VPS (Via Terminal hPanel)

1. **hPanel** → **VPS** → **Manage** → **Terminal**
2. Exécutez ces commandes :

```bash
# Créer le dossier .ssh si nécessaire
mkdir -p ~/.ssh
chmod 700 ~/.ssh

# Ajouter la clé publique (remplacez par votre clé)
echo "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAACAQ... leadgentax@github" >> ~/.ssh/authorized_keys

# Permissions correctes
chmod 600 ~/.ssh/authorized_keys
```

**⚠️ Important** : Remplacez `ssh-rsa AAAAB3NzaC1yc2E...` par votre vraie clé publique (celle que vous avez copiée à l'étape 1).

---

## 📋 Méthode 2 : Via File Manager hPanel

1. **hPanel** → **VPS** → **Manage** → **File Manager**
2. Naviguez vers `/root/.ssh/`
3. Si le fichier `authorized_keys` existe, éditez-le
4. Si il n'existe pas, créez-le
5. Ajoutez votre clé publique à la fin du fichier
6. **Permissions** : 600

---

## ✅ Test de la Connexion

**Sur votre Mac**, testez :

```bash
ssh -i ~/.ssh/leadgentax_hostinger root@91.108.105.32
```

Si ça se connecte **sans demander de mot de passe**, c'est bon ! ✅

---

## 🔐 Ajouter les Secrets GitHub

Une fois la connexion SSH fonctionnelle :

1. **Récupérer la clé privée** (sur votre Mac) :
```bash
cat ~/.ssh/leadgentax_hostinger
```

2. **Ajouter dans GitHub** :
   - https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
   - Secret 1 : `HOSTINGER_VPS_IP` = `91.108.105.32`
   - Secret 2 : `HOSTINGER_SSH_PRIVATE_KEY` = [collez la clé privée complète]

---

## 🎉 C'est Tout !

Une fois configuré, chaque push sur GitHub déploiera automatiquement sur le VPS !

