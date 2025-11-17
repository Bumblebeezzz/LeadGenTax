# 📋 Comment Accéder aux Logs Détaillés GitHub Actions

## 🔍 Étapes pour Voir les Logs

### 1. Accéder au Workflow
1. Allez sur : https://github.com/Bumblebeezzz/LeadGenTax/actions
2. Cliquez sur le workflow qui a échoué (icône rouge ❌)
3. Exemple : "Simplification workflow: retrait set -e, utilisation bash explicite #10"

### 2. Accéder aux Logs du Job
1. Dans le panneau de gauche, cliquez sur **"Jobs"**
2. Cliquez sur **"deploy"** (avec l'icône ❌)

### 3. Voir les Logs de Chaque Étape
1. Vous verrez une liste d'étapes :
   - ✅ Checkout code
   - ✅ Setup SSH
   - ❌ Deploy to VPS (c'est probablement ici que ça échoue)
   - Cleanup

2. **Cliquez sur l'étape "Deploy to VPS"** pour voir les logs détaillés

### 4. Analyser les Logs
Dans les logs, cherchez :
- Les messages avec 🚀, 📥, ✅, ❌, ⚠️
- La **dernière ligne** avant l'erreur
- Le message d'erreur exact

---

## 🔍 Ce qu'il Faut Chercher

### Si vous voyez "Connexion SSH réussie" ou "🚀 Début du déploiement"
✅ La connexion SSH fonctionne. Le problème est dans le script de déploiement.

### Si vous voyez "Permission denied" ou "Connection refused"
❌ Problème de connexion SSH ou de secrets GitHub.

### Si vous voyez "git pull échoué" ou "git reset échoué"
❌ Problème avec le repository Git sur le VPS.

### Si vous voyez "Impossible d'accéder à /var/www/leadgentax.au"
❌ Problème de permissions ou répertoire inexistant.

---

## 📸 Capture d'Écran des Logs

**Pouvez-vous :**
1. Cliquer sur l'étape "Deploy to VPS"
2. Faire défiler jusqu'à la fin des logs
3. **Prendre une capture d'écran** des 20-30 dernières lignes
4. Me l'envoyer

Cela m'aidera à identifier exactement où et pourquoi ça échoue.

---

## 🔧 Solution Alternative : Déploiement Manuel

Si le workflow continue d'échouer, nous pouvons :
1. **Déployer manuellement** via SSH depuis votre Mac
2. **Créer un script de déploiement** à exécuter sur le VPS
3. **Utiliser GitHub Actions uniquement pour déclencher** le script

Dites-moi si vous préférez cette approche.

---

## ✅ Vérification Rapide des Secrets

Avant de continuer, vérifiez que les secrets sont bien configurés :

1. Allez sur : https://github.com/Bumblebeezzz/LeadGenTax/settings/secrets/actions
2. Vérifiez que vous avez :
   - ✅ `HOSTINGER_VPS_IP` (valeur : `91.108.105.32`)
   - ✅ `HOSTINGER_SSH_PRIVATE_KEY` (valeur : clé privée complète)

3. Si un secret est manquant ou incorrect, **modifiez-le** ou **ajoutez-le**.

---

**En attendant, pouvez-vous me dire :**
- Quelle est la **dernière ligne** que vous voyez dans les logs de "Deploy to VPS" ?
- Y a-t-il un **message d'erreur spécifique** ?

