# ✅ Commandes Finales - Installation LeadGenTax

## 🚀 Installation en 1 Commande

**Copiez-collez cette commande complète dans le terminal hPanel :**

```bash
mkdir -p /var/www/leadgentax.au && cd /var/www/leadgentax.au && git clone https://github.com/Bumblebeezzz/LeadGenTax.git . && chmod -R 755 . && find . -type f -exec chmod 644 {} \; && chmod 755 router.php index.php && echo "✅ Installation terminée dans /var/www/leadgentax.au/"
```

---

## 📋 Ou Étape par Étape (Plus Lisible)

### 1. Créer le répertoire
```bash
mkdir -p /var/www/leadgentax.au
cd /var/www/leadgentax.au
```

### 2. Cloner (sans authentification - repository public)
```bash
git clone https://github.com/Bumblebeezzz/LeadGenTax.git .
```

**⚠️ Si ça demande un username/password** : Laissez vide et appuyez sur Entrée deux fois, ou utilisez la méthode alternative ci-dessous.

### 3. Permissions
```bash
chmod -R 755 .
find . -type f -exec chmod 644 {} \;
chmod 755 router.php index.php
```

---

## 🔄 Alternative : Si Git Clone Échoue

### Méthode 1 : Télécharger le ZIP

```bash
cd /var/www/leadgentax.au
wget https://github.com/Bumblebeezzz/LeadGenTax/archive/refs/heads/main.zip
unzip main.zip
mv LeadGenTax-main/* .
mv LeadGenTax-main/.* . 2>/dev/null || true
rm -rf LeadGenTax-main main.zip
chmod -R 755 .
find . -type f -exec chmod 644 {} \;
chmod 755 router.php index.php
```

### Méthode 2 : Utiliser le Script d'Installation

```bash
# Télécharger le script
wget -O /tmp/install-simple.sh https://raw.githubusercontent.com/Bumblebeezzz/LeadGenTax/main/INSTALL_SIMPLE.sh

# L'exécuter
bash /tmp/install-simple.sh
```

---

## ✅ Vérification

```bash
# Vérifier que les fichiers sont là
ls -la /var/www/leadgentax.au/

# Vous devriez voir: index.php, router.php, includes/, templates/, static/
```

---

## 🎯 Résultat

**LeadGenTax installé dans : `/var/www/leadgentax.au/`**

**✅ Aucun conflit avec tradeasy** (pas trouvé sur ce VPS)

**✅ Structure isolée :**
```
/var/www/
├── html/              ← Dossier par défaut (ignoré)
└── leadgentax.au/     ← Votre site (isolé)
```

---

## 📝 Prochaines Étapes

1. **Configurer le domaine** dans hPanel
2. **Configurer le web server** (Nginx/Apache)
3. **Activer SSL**

