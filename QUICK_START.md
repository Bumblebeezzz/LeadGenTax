# Quick Start Guide - TaxPro.au

## 🚀 Get Started in 5 Minutes

### 1. Local Testing

```bash
cd TAXPRO_AU_PHP
php -S localhost:8000 router.php
```

Visit: http://localhost:8000

### 2. Configure Google Sheets (Optional)

1. Create a Google Sheet
2. Get Service Account JSON from Google Cloud Console
3. Share sheet with service account email
4. Update `includes/config.php`:
   ```php
   define('GOOGLE_SHEETS_CREDENTIALS', '/path/to/credentials.json');
   define('GOOGLE_SHEETS_SPREADSHEET_ID', 'your-sheet-id');
   ```

### 3. Configure Telegram (Optional)

1. Create bot via @BotFather on Telegram
2. Get your Chat ID from @userinfobot
3. Update `includes/config.php`:
   ```php
   define('TELEGRAM_BOT_TOKEN', 'your-bot-token');
   define('TELEGRAM_CHAT_ID', 'your-chat-id');
   ```

### 4. Deploy to Hostinger

1. Push to GitHub repository
2. Add GitHub Secrets:
   - `FTP_SERVER`
   - `FTP_USERNAME`
   - `FTP_PASSWORD`
3. Push to `main` branch → Auto-deploy!

## ✅ Checklist

- [ ] Test locally
- [ ] Configure Google Sheets (optional)
- [ ] Configure Telegram (optional)
- [ ] Set up GitHub Actions secrets
- [ ] Deploy to Hostinger
- [ ] Test contact form
- [ ] Verify SEO (sitemap.xml, robots.txt)

## 📝 Notes

- Form works even without Google Sheets/Telegram (will show error but won't break)
- All content is in English
- Mobile-responsive design
- SEO optimized

