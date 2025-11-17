# ⚠️ Correction DNS - Ne Pas Ajouter un Deuxième Enregistrement A

## ❌ Ne Cliquez PAS sur "Confirm" !

**Hostinger vous avertit** : "Having more than one record may cause your website to become inaccessible online"

**C'est correct** : Avoir **deux enregistrements A** pour le même nom (`@`) peut causer des problèmes.

---

## ✅ Solution : Modifier l'Enregistrement Existant

### Au lieu d'ajouter un nouveau, MODIFIEZ l'existant :

1. **Cliquez sur "Cancel"** dans la boîte de dialogue
2. **Trouvez l'enregistrement A existant** dans la liste DNS
3. **Cliquez sur "Edit"** ou l'icône de modification
4. **Changez** :
   - **Content** : `84.32.84.32` → `91.108.105.32`
   - **TTL** : `50` → `3600` (optionnel, mais recommandé)
5. **Sauvegardez**

---

## 📋 Étapes Détaillées

### 1. Annuler la Boîte de Dialogue
- Cliquez sur **"Cancel"**

### 2. Trouver l'Enregistrement A Existant
Dans la liste des enregistrements DNS, vous devriez voir :
```
Type: A
Name: @
Content: 84.32.84.32
TTL: 50
```

### 3. Modifier l'Enregistrement
- Cliquez sur **"Edit"** (ou l'icône crayon) à côté de cet enregistrement
- Changez **Content** : `84.32.84.32` → `91.108.105.32`
- Changez **TTL** : `50` → `3600` (optionnel)
- Cliquez sur **"Save"** ou **"Update"**

### 4. Ajouter l'Enregistrement pour www (Si Nécessaire)
Si vous n'avez pas encore d'enregistrement pour `www` :
- Cliquez sur **"Add Record"**
- **Type** : A
- **Name** : `www`
- **Content** : `91.108.105.32`
- **TTL** : `3600`
- Cliquez sur **"Save"**

---

## ✅ Résultat Attendu

Après modification, vous devriez avoir :

```
Type: A
Name: @
Content: 91.108.105.32
TTL: 3600

Type: A
Name: www
Content: 91.108.105.32
TTL: 3600
```

**Un seul enregistrement A pour `@`** pointant vers `91.108.105.32` ✅

---

## ⏱️ Propagation DNS

- **Délai** : 15-30 minutes (parfois jusqu'à 48 heures)
- **Vérifier** : Utilisez `dig leadgentax.com.au` ou `nslookup leadgentax.com.au`

**Résultat attendu** : `91.108.105.32`

---

## 🆘 Si Vous Avez Déjà Cliqué sur "Confirm"

Si vous avez déjà ajouté le deuxième enregistrement :

1. **Allez dans la liste DNS**
2. **Supprimez l'ancien enregistrement** (`84.32.84.32`)
3. **Gardez seulement** celui avec `91.108.105.32`

**Ou** :

1. **Supprimez les deux enregistrements A** pour `@`
2. **Créez un nouveau** avec `91.108.105.32`

---

## 📝 Résumé

- ❌ **Ne PAS** ajouter un deuxième enregistrement A
- ✅ **MODIFIER** l'enregistrement existant
- ✅ **Changer** `84.32.84.32` → `91.108.105.32`
- ✅ **Ajouter** un enregistrement pour `www` si nécessaire

---

**Dernière mise à jour** : 2025-11-17

