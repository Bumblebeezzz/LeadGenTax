# ✅ Étapes Finales - Configuration GitHub Actions

## ✅ Clé SSH Copiée !

La clé publique est maintenant sur le VPS. Passons aux étapes finales.

---

## 🔐 Étape 1 : Récupérer la Clé Privée

**Sur votre Mac** (dans Terminal), exécutez :

```bash
cat ~/.ssh/leadgentax_hostinger
```

**Copiez TOUT le contenu** (de `-----BEGIN OPENSSH PRIVATE KEY-----` jusqu'à `-----END OPENSSH PRIVATE KEY-----`)

---

## 🔐 Étape 2 : Ajouter les Secrets GitHub

1. **Allez sur** : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Cliquez sur **"New repository secret"**

### Secret 1 : HOSTINGER_VPS_IP
```
Name: HOSTINGER_VPS_IP
Value: 91.108.105.32
```

### Secret 2 : HOSTINGER_SSH_PRIVATE_KEY
```
Name: HOSTINGER_SSH_PRIVATE_KEY
Value: [Collez ici TOUT le contenu de la clé privée que vous avez copiée]
```

**⚠️ Important** : Collez la clé privée complète, y compris les lignes `-----BEGIN` et `-----END`.

---

## ✅ Étape 3 : Tester le Déploiement

**Sur votre Mac**, exécutez :

```bash
cd /Users/osiris/Documents/PROGRAM/LEADGENTAX_PHP
echo "# Test déploiement automatique $(date)" >> README.md
git add .
git commit -m "Test déploiement automatique"
git push origin main
```

---

## 🔍 Vérification

1. **Allez sur** : https://github.com/Bumblebeezzz/LeadGenTax/actions
2. Vous devriez voir un workflow **"Deploy to Hostinger VPS"** en cours d'exécution
3. Cliquez dessus pour voir les logs en temps réel
4. Attendez 1-2 minutes
5. Vérifiez que toutes les étapes sont vertes ✅

---

## ✅ Vérifier sur le VPS

**Dans le terminal hPanel**, exécutez :

```bash
# Vérifier la date de modification (devrait être récente)
stat /var/www/leadgentax.au/index.php

# Vérifier le contenu
ls -la /var/www/leadgentax.au/
```

---

## 🎉 Résultat

**Une fois configuré :**
- ✅ **Push sur GitHub** → **Déploiement automatique** sur `/var/www/leadgentax.au/`
- ✅ **Aucune manipulation manuelle** nécessaire
- ✅ **Mises à jour en quelques secondes**
- ✅ **Protection anti-conflit** avec tradeasy

---

## 🆘 Dépannage

### Le workflow échoue

1. Vérifiez les secrets GitHub (noms exacts)
2. Vérifiez que la clé privée est complète (avec BEGIN et END)
3. Regardez les logs dans GitHub Actions pour l'erreur exacte

### Les fichiers ne se mettent pas à jour

1. Vérifiez les logs GitHub Actions
2. Vérifiez les permissions sur le VPS : `ls -la /var/www/leadgentax.au/`

---

## 📋 Checklist Finale

- [ ] Clé privée récupérée sur Mac
- [ ] Secret `HOSTINGER_VPS_IP` ajouté dans GitHub
- [ ] Secret `HOSTINGER_SSH_PRIVATE_KEY` ajouté dans GitHub
- [ ] Test de déploiement effectué
- [ ] Workflow GitHub Actions réussi
- [ ] Site mis à jour sur le VPS

---

## 🎯 C'est Terminé !

**Maintenant, à chaque push sur GitHub, le site se met à jour automatiquement !** 🚀

