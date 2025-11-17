# 🚀 Installation Directe - Commandes Simples

## ✅ Installation en 3 Commandes

Copiez-collez ces commandes **une par une** dans le terminal hPanel :

### Étape 1 : Créer le Répertoire

```bash
mkdir -p /var/www/leadgentax.au
cd /var/www/leadgentax.au
```

### Étape 2 : Cloner depuis GitHub

```bash
git clone https://github.com/Bumblebeezzz/LeadGenTax.git .
```

### Étape 3 : Configurer les Permissions

```bash
chmod -R 755 .
find . -type f -exec chmod 644 {} \;
chmod 755 router.php index.php
```

---

## ✅ C'est Tout !

**LeadGenTax est maintenant installé dans : `/var/www/leadgentax.au/`**

---

## 🔍 Vérification

```bash
# Vérifier que les fichiers sont là
ls -la /var/www/leadgentax.au/

# Vérifier PHP
php -v
```

---

## 📋 Prochaines Étapes

1. **Configurer le domaine** dans hPanel (si pas déjà fait)
2. **Configurer Nginx/Apache** pour pointer vers `/var/www/leadgentax.au/`
3. **Activer SSL** (Let's Encrypt)

---

## 🎯 Structure Finale

```
/var/www/
├── html/                    ← Dossier par défaut (ignoré)
└── leadgentax.au/           ← Votre nouveau site (isolé)
    ├── index.php
    ├── router.php
    ├── includes/
    ├── templates/
    └── static/
```

**✅ Aucun conflit avec tradeasy** (qui n'est pas sur ce VPS ou est ailleurs)

