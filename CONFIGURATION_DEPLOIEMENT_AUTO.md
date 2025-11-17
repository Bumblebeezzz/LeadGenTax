# 🚀 Configuration Déploiement Automatique GitHub → VPS Hostinger

## ✅ Repository Public Confirmé

Le repository est maintenant public, donc le déploiement automatique va fonctionner !

---

## 🎯 Configuration en 3 Étapes

### Étape 1 : Générer une Clé SSH (Sur votre Mac)

Ouvrez Terminal et exécutez :

```bash
# Générer la clé SSH
ssh-keygen -t rsa -b 4096 -C "leadgentax@github" -f ~/.ssh/leadgentax_hostinger

# Appuyez sur Entrée pour accepter l'emplacement par défaut
# Laissez le mot de passe vide (ou créez-en un si vous préférez)
```

### Étape 2 : Copier la Clé Publique sur le VPS

```bash
# Copier la clé publique sur le VPS
ssh-copy-id -i ~/.ssh/leadgentax_hostinger.pub root@91.108.105.32

# Entrez le mot de passe root du VPS quand demandé
```

### Étape 3 : Ajouter les Secrets GitHub

1. **Allez sur** : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Cliquez sur **"New repository secret"**
3. Ajoutez ces 2 secrets :

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

## ✅ Vérification

1. **Faites un petit changement** dans le code
2. **Poussez sur GitHub** :
   ```bash
   git add .
   git commit -m "Test déploiement automatique"
   git push origin main
   ```
3. **Vérifiez dans GitHub** → **Actions** → Vous verrez le workflow s'exécuter
4. **Attendez 1-2 minutes**, puis vérifiez votre site

---

## 🔍 Vérifier le Déploiement

### Dans GitHub Actions

1. Allez sur : https://github.com/Bumblebeezzz/LeadGenTax/actions
2. Cliquez sur le dernier workflow
3. Vérifiez que toutes les étapes sont vertes ✅

### Sur le VPS

```bash
# Se connecter au VPS
ssh root@91.108.105.32

# Vérifier les fichiers
ls -la /var/www/leadgentax.au/

# Vérifier la date de modification (devrait être récente)
stat /var/www/leadgentax.au/index.php
```

---

## 🆘 Dépannage

### Le workflow échoue avec "Permission denied"

**Solution** : Vérifiez que la clé SSH publique est bien sur le VPS :
```bash
ssh root@91.108.105.32
cat ~/.ssh/authorized_keys
# Vous devriez voir votre clé publique
```

### Le workflow échoue avec "Host key verification failed"

**Solution** : Le workflow gère cela automatiquement avec `ssh-keyscan`, mais si ça échoue, vérifiez les secrets GitHub.

### Les fichiers ne se mettent pas à jour

**Solution** : Vérifiez les logs dans GitHub Actions pour voir l'erreur exacte.

---

## 📋 Checklist

- [ ] Clé SSH générée sur votre Mac
- [ ] Clé publique copiée sur le VPS
- [ ] Secret `HOSTINGER_VPS_IP` ajouté dans GitHub
- [ ] Secret `HOSTINGER_SSH_PRIVATE_KEY` ajouté dans GitHub
- [ ] Test de déploiement réussi
- [ ] Site mis à jour automatiquement

---

## 🎯 Résultat Final

**Avec cette configuration :**
- ✅ **Push sur GitHub** → **Déploiement automatique** sur le VPS
- ✅ **Aucune manipulation manuelle** nécessaire
- ✅ **Mises à jour en quelques secondes**
- ✅ **Protection anti-conflit** avec tradeasy (vérification automatique)

**Temps de configuration : 5 minutes**
**Temps de déploiement : Automatique !** 🚀

