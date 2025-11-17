# Notes de Déploiement - LeadGenTax.au

## ✅ Corrections Appliquées

### 1. Video Hero Fallback
- ✅ Image de fallback ajoutée (`hero-fallback.png`)
- ✅ La vidéo est devant l'image (z-index: 1 vs 0)
- ✅ Si la vidéo ne charge pas, l'image s'affiche automatiquement
- ✅ Gestion d'erreur JavaScript pour masquer la vidéo en cas d'échec

### 2. Google Analytics 4
- ✅ Code GA4 ajouté dans `header.php`
- ✅ Configuration dans `config.php` : `GA4_MEASUREMENT_ID`
- ✅ Tracking des conversions de formulaire automatique
- ⚠️ **À configurer** : Ajouter votre `GA4_MEASUREMENT_ID` dans `includes/config.php`

**Configuration GA4 :**
```php
define('GA4_MEASUREMENT_ID', 'G-XXXXXXXXXX'); // Remplacez par votre ID GA4
```

### 3. Validation Email
- ✅ Validation côté client (JavaScript) avec regex
- ✅ Validation côté serveur (PHP) avec `filter_var()`
- ✅ Protection honeypot contre le spam
- ✅ Rate limiting (1 soumission par minute)

### 4. Render.com Free Plan
- ⚠️ **IMPORTANT** : Le plan gratuit de Render.com met le service en veille après 15 minutes d'inactivité
- ⚠️ **Recommandation** : Passer au plan **Starter ($7/mois)** pour éviter les downtimes
- ⚠️ Le premier chargement après veille peut prendre 30-60 secondes (cold start)

**Pour passer au plan Starter :**
1. Allez dans Render Dashboard → Votre service → Settings
2. Changez le plan de "Free" à "Starter"
3. Le service sera toujours actif, sans downtime

## 📋 Checklist de Configuration

### Avant le déploiement en production :

- [ ] Configurer `GA4_MEASUREMENT_ID` dans `includes/config.php`
- [ ] Configurer `GOOGLE_SHEETS_SPREADSHEET_ID` dans `includes/config.php`
- [ ] Ajouter le fichier `google-sheets-credentials.json` (service account)
- [ ] Configurer `TELEGRAM_BOT_TOKEN` et `TELEGRAM_CHAT_ID` (optionnel)
- [ ] Tester la vidéo hero et vérifier le fallback image
- [ ] Tester la validation email du formulaire
- [ ] Vérifier que GA4 track les conversions
- [ ] Passer au plan Starter sur Render.com (recommandé)

## 🎯 Améliorations Futures

- [ ] Convertir la vidéo `.mov` en `.mp4` pour meilleure compatibilité
- [ ] Optimiser l'image de fallback (compression WebP)
- [ ] Ajouter Google Tag Manager pour gestion centralisée
- [ ] Implémenter reCAPTCHA v3 pour protection anti-spam supplémentaire

