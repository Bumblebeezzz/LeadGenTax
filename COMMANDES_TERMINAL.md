# 📋 Commandes à Exécuter dans le Terminal hPanel

## 🔍 Étape 1 : Trouver Où Sont les Sites

Copiez-collez ces commandes **une par une** dans le terminal hPanel :

```bash
# Vérifier /var/www/
ls -la /var/www/

# Vérifier /home/
ls -la /home/

# Chercher earthstralia
find /var/www /home -name "*earthstralia*" -type d 2>/dev/null

# Chercher tradeasy
find /var/www /home -name "*tradeasy*" -type d 2>/dev/null
```

**Notez** où sont installés les sites existants.

---

## 🚀 Étape 2 : Installer LeadGenTax

### Option A : Si les sites sont dans /var/www/

```bash
# Créer le répertoire
mkdir -p /var/www/leadgentax.au
cd /var/www/leadgentax.au

# Cloner depuis GitHub
git clone https://github.com/Bumblebeezzz/LeadGenTax.git .

# Permissions
chmod -R 755 .
find . -type f -exec chmod 644 {} \;
chmod 755 router.php index.php
```

### Option B : Si vous voulez créer /root/domains/ (structure Hostinger)

```bash
# Créer la structure
mkdir -p /root/domains/leadgentax.au/public_html
cd /root/domains/leadgentax.au/public_html

# Cloner depuis GitHub
git clone https://github.com/Bumblebeezzz/LeadGenTax.git .

# Permissions
chmod -R 755 .
find . -type f -exec chmod 644 {} \;
chmod 755 router.php index.php
```

---

## ✅ Vérification

```bash
# Vérifier que les fichiers sont là
ls -la /var/www/leadgentax.au/
# ou
ls -la /root/domains/leadgentax.au/public_html/

# Tester PHP
php -v
```

---

## 🎯 Prochaines Étapes

1. **Configurer le domaine** dans hPanel
2. **Configurer Nginx/Apache** pour pointer vers le répertoire
3. **Activer SSL**

**Le script d'installation automatique détectera automatiquement le bon répertoire !**

