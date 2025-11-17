# 🛒 Guide d'Achat et Configuration d'un Nom de Domaine

## 📋 Ordre des Étapes

### ✅ Étape 1 : Acheter le Nom de Domaine (OBLIGATOIRE EN PREMIER)

**Oui, vous devez d'abord acheter le nom de domaine avant de pouvoir le configurer.**

---

## 🛒 Où Acheter un Nom de Domaine ?

### Options Recommandées

#### 1. **Hostinger** (Recommandé si vous avez déjà un VPS chez eux)
- ✅ **Avantages** : Tout au même endroit, gestion simplifiée
- ✅ **Prix** : ~$10-15/an pour `.au`
- 🌐 **Site** : https://www.hostinger.com/domain-registration

#### 2. **Namecheap**
- ✅ **Avantages** : Interface simple, bon support
- ✅ **Prix** : ~$10-20/an pour `.au`
- 🌐 **Site** : https://www.namecheap.com/

#### 3. **GoDaddy**
- ✅ **Avantages** : Très populaire, promotions fréquentes
- ✅ **Prix** : ~$15-25/an pour `.au` (souvent des promos la première année)
- 🌐 **Site** : https://www.godaddy.com/

#### 4. **Cloudflare Registrar**
- ✅ **Avantages** : Prix au coût (pas de marge), DNS gratuit
- ✅ **Prix** : ~$10-15/an pour `.au`
- 🌐 **Site** : https://www.cloudflare.com/products/registrar/

---

## 🎯 Nom de Domaine Recommandé

Pour votre projet **LeadGenTax**, voici des suggestions :

### Option 1 : `.au` (Australie - Recommandé)
- `leadgentax.au` ✅ **IDÉAL** (court, clair, local)
- `leadgentax.com.au` (si `.au` n'est pas disponible)
- `taxleadgen.au`

### Option 2 : `.com` (International)
- `leadgentax.com`
- `taxleadgen.com`

### Option 3 : Autres extensions
- `leadgentax.io`
- `leadgentax.net`

---

## 💰 Coûts Approximatifs

| Extension | Prix/An | Recommandation |
|-----------|---------|----------------|
| `.au` | $10-15 | ✅ **Meilleur pour l'Australie** |
| `.com.au` | $15-25 | ✅ Bon pour l'Australie |
| `.com` | $10-15 | ✅ International |
| `.io` | $30-50 | ⚠️ Plus cher |
| `.net` | $10-15 | ✅ Alternative |

---

## 📝 Processus d'Achat

### 1. Vérifier la Disponibilité

Avant d'acheter, vérifiez si le nom est disponible :

- **Hostinger** : https://www.hostinger.com/domain-checker
- **Namecheap** : https://www.namecheap.com/domains/registration/
- **GoDaddy** : https://www.godaddy.com/en/domains

### 2. Acheter le Domaine

1. **Choisissez votre registrar** (Hostinger recommandé si VPS chez eux)
2. **Recherchez** `leadgentax.au` (ou votre choix)
3. **Ajoutez au panier** si disponible
4. **Passez à la caisse**
5. **Configurez les informations** :
   - Email de contact
   - Informations WHOIS (peut être masqué pour la confidentialité)
   - Protection WHOIS (recommandé, souvent gratuit la première année)

### 3. Options Recommandées lors de l'Achat

- ✅ **Protection WHOIS** : Masque vos informations personnelles (gratuit ou ~$5/an)
- ✅ **Renouvellement automatique** : Évite la perte du domaine
- ⚠️ **Hébergement web** : **NE PAS ACHETER** (vous avez déjà le VPS)
- ⚠️ **Email professionnel** : Optionnel (peut être ajouté plus tard)

---

## 🔄 Après l'Achat

### Étape 2 : Attendre l'Activation

- ⏱️ **Délai** : Généralement 5-30 minutes
- ✅ **Vérification** : Le domaine apparaît dans votre compte

### Étape 3 : Configurer le DNS

Une fois le domaine acheté et activé, suivez le guide `CONFIGURATION_DOMAINE.md` :

1. **Configurer les enregistrements DNS** (A record vers `91.108.105.32`)
2. **Configurer le serveur web** sur le VPS
3. **Installer SSL** (Let's Encrypt)

---

## 🎯 Recommandation Spécifique pour Vous

### Si vous avez un VPS Hostinger

**Option 1 : Acheter chez Hostinger** ✅ **RECOMMANDÉ**
- ✅ Tout au même endroit
- ✅ Configuration DNS simplifiée
- ✅ Support unifié
- ✅ Peut être configuré directement depuis hPanel

**Option 2 : Acheter ailleurs**
- ✅ Plus de flexibilité
- ✅ Peut être moins cher
- ⚠️ Nécessite de configurer les DNS manuellement

---

## 📋 Checklist d'Achat

- [ ] Vérifier la disponibilité du nom de domaine
- [ ] Comparer les prix entre registrars
- [ ] Choisir un registrar (Hostinger recommandé)
- [ ] Acheter le domaine
- [ ] Activer la protection WHOIS (recommandé)
- [ ] Activer le renouvellement automatique
- [ ] Attendre l'activation (5-30 minutes)
- [ ] Passer à la configuration DNS (voir `CONFIGURATION_DOMAINE.md`)

---

## 💡 Astuce : Vérifier la Disponibilité

**Sur votre Mac**, vous pouvez vérifier rapidement :

```bash
# Vérifier si leadgentax.au est disponible
whois leadgentax.au | grep -i "status\|available\|registered"
```

Ou utilisez les outils en ligne des registrars.

---

## 🆘 Questions Fréquentes

### Puis-je configurer le domaine avant de l'acheter ?
❌ **Non**, vous devez d'abord posséder le domaine pour pouvoir le configurer.

### Combien de temps prend l'activation ?
⏱️ Généralement **5-30 minutes** après l'achat.

### Puis-je changer de registrar plus tard ?
✅ **Oui**, vous pouvez transférer le domaine vers un autre registrar (généralement après 60 jours).

### Dois-je acheter l'hébergement avec le domaine ?
❌ **Non**, vous avez déjà le VPS. Ne prenez que le domaine.

### Puis-je utiliser un domaine que je possède déjà ?
✅ **Oui**, si vous avez déjà un domaine, vous pouvez simplement configurer les DNS pour pointer vers votre VPS.

---

## 🎉 Résumé

1. ✅ **Achetez d'abord** le nom de domaine (ex: `leadgentax.au`)
2. ⏱️ **Attendez l'activation** (5-30 minutes)
3. 🔧 **Configurez les DNS** (voir `CONFIGURATION_DOMAINE.md`)
4. 🌐 **Configurez le serveur web** sur le VPS
5. 🔒 **Installez SSL** (Let's Encrypt)

---

**Une fois le domaine acheté, revenez ici et suivez le guide `CONFIGURATION_DOMAINE.md` !** 🚀

---

**Dernière mise à jour** : 2025-11-17

