# 🔍 Comment Vérifier Où Est Tradeasy

## ⚠️ Problème de Connexion SSH

Le script automatique nécessite une authentification SSH configurée. Voici **3 méthodes alternatives** pour vérifier où est tradeasy :

---

## 🎯 Méthode 1 : Via Terminal hPanel (Plus Simple)

### Étape 1 : Accéder au Terminal

1. **hPanel** → **VPS** → **Manage** → `srv508687.hstgr.cloud`
2. Cliquez sur le bouton **"Terminal"** (en haut à droite)

### Étape 2 : Copier-Coller le Script

Copiez tout le contenu du fichier `check-tradeasy-direct.sh` et collez-le dans le terminal hPanel, puis appuyez sur Entrée.

**OU** exécutez ces commandes une par une :

```bash
# Chercher tradeasy
find /root -name "*tradeasy*" -type d 2>/dev/null
find /var/www -name "*tradeasy*" -type d 2>/dev/null
find /home -name "*tradeasy*" -type d 2>/dev/null

# Vérifier la structure
ls -la /root/domains/ 2>/dev/null
ls -la /var/www/ 2>/dev/null

# Vérifier les configurations web
grep -r "tradeasy" /etc/nginx/sites-available/ 2>/dev/null
grep -r "tradeasy" /etc/apache2/sites-available/ 2>/dev/null
```

---

## 🎯 Méthode 2 : Via hPanel File Manager

1. **hPanel** → **VPS** → **Manage** → **File Manager**
2. Naviguez dans :
   - `/root/domains/` → Cherchez des dossiers avec "tradeasy"
   - `/var/www/` → Cherchez des dossiers avec "tradeasy"
   - `/home/` → Cherchez des dossiers avec "tradeasy"

---

## 🎯 Méthode 3 : Via hPanel Websites

1. **hPanel** → **Websites**
2. Cherchez "tradeasy" dans la liste
3. Si trouvé, cliquez sur **"Manage"**
4. Regardez le **"Document Root"** ou **"Path"**

**Si tradeasy n'apparaît pas dans Websites** :
- Il est probablement sur **Cloud Hosting** (géré séparément)
- Ou sur un **autre serveur**

---

## ✅ Conclusion Rapide

**Peu importe où est tradeasy :**

### Si tradeasy est sur Cloud Hosting :
- ✅ **Aucun conflit** (Cloud Hosting et VPS sont séparés)
- ✅ LeadGenTax peut être installé sur le VPS en toute sécurité

### Si tradeasy est sur le VPS :
- ✅ **Aucun conflit** si dans un répertoire séparé
- ✅ LeadGenTax sera dans `/root/domains/leadgentax.au/`
- ✅ Tradeasy sera dans son propre répertoire (ex: `/root/domains/tradeasy.me/`)

### Si tradeasy est sur un autre serveur :
- ✅ **Aucun conflit**
- ✅ LeadGenTax peut être installé en toute sécurité

---

## 🚀 Action Immédiate

**La méthode la plus simple** : Utilisez le **Terminal hPanel** et exécutez :

```bash
ls -la /root/domains/
```

Cela vous montrera tous les sites installés sur le VPS.

**Si vous voyez tradeasy** → Il est sur le VPS (mais dans un répertoire séparé)
**Si vous ne voyez pas tradeasy** → Il est sur Cloud Hosting ou ailleurs

**Dans tous les cas, aucun conflit possible !** ✅

