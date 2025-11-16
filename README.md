# TaxPro.au - Marketing Site for Accounting Firms

Professional marketing website for accounting firms, built with PHP. Generates leads through AI Receptionist 24/7, Google Ads, and optimized website solutions.

## Features

- **Modern Design**: Clean, professional design with Inter font and custom color scheme (#003366, #00CC66)
- **Responsive**: Mobile-first design, works on all devices
- **Lead Generation**: Contact forms with Google Sheets + Telegram integration
- **SEO Optimized**: Schema.org LocalBusiness, sitemap.xml, robots.txt
- **Performance**: GZIP compression, browser caching, optimized assets
- **Animations**: Smooth scroll animations, fade-in effects, parallax

## Structure

```
TAXPRO_AU_PHP/
├── index.php              # Main landing page
├── router.php             # URL routing
├── .htaccess             # Apache configuration
├── includes/
│   ├── config.php        # Configuration (Google Sheets, Telegram)
│   ├── functions.php     # Helper functions
│   └── contact_handler.php # Form processing
├── templates/
│   ├── header.php        # HTML head, navigation
│   └── footer.php       # Footer, scripts
├── static/
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript files
│   └── images/          # Images, favicon
├── api/
│   └── contact.php      # Contact form endpoint
└── .github/workflows/
    └── deploy.yml        # GitHub Actions deployment
```

## Configuration

### 1. Google Sheets API Setup

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select existing
3. Enable Google Sheets API
4. Create a Service Account:
   - Go to "IAM & Admin" > "Service Accounts"
   - Click "Create Service Account"
   - Download the JSON key file
5. Share your Google Sheet with the service account email
6. Upload the JSON file to your server (outside public_html for security)
7. Update `includes/config.php`:
   ```php
   define('GOOGLE_SHEETS_CREDENTIALS', '/path/to/google-sheets-credentials.json');
   define('GOOGLE_SHEETS_SPREADSHEET_ID', 'your-spreadsheet-id');
   define('GOOGLE_SHEETS_RANGE', 'Sheet1!A:F');
   ```

### 2. Telegram Bot Setup

1. Open Telegram and search for [@BotFather](https://t.me/botfather)
2. Send `/newbot` and follow instructions
3. Copy the Bot Token
4. Get your Chat ID:
   - Send a message to [@userinfobot](https://t.me/userinfobot)
   - Copy your Chat ID
5. Update `includes/config.php`:
   ```php
   define('TELEGRAM_BOT_TOKEN', 'your-bot-token');
   define('TELEGRAM_CHAT_ID', 'your-chat-id');
   ```

### 3. GitHub Actions Deployment

1. Add secrets to your GitHub repository:
   - `FTP_SERVER`: Your Hostinger FTP server IP
   - `FTP_USERNAME`: Your FTP username
   - `FTP_PASSWORD`: Your FTP password

2. Push to `main` branch to trigger automatic deployment

## Local Development

### Using PHP Built-in Server

```bash
cd TAXPRO_AU_PHP
php -S localhost:8000 router.php
```

Visit `http://localhost:8000`

### Using Apache/Nginx

1. Point your web server document root to `TAXPRO_AU_PHP/`
2. Ensure `.htaccess` is enabled (mod_rewrite)
3. Visit your domain

## Sections

- **Hero**: Main headline with CTA
- **Stats**: Animated counters (220+ firms, 98% satisfaction, 3x ROI)
- **Services**: AI Receptionist, Optimized Website, Google Ads
- **Case Study**: Before/After results (+318% leads)
- **Testimonials**: Client reviews
- **Contact Form**: Pop-up (10s delay) + footer form

## Customization

### Colors

Edit CSS variables in `static/css/style.css`:

```css
:root {
    --primary: #003366;  /* Dark blue */
    --accent: #00CC66;    /* Green */
    --light: #F5F5F5;     /* Light gray */
    --white: #FFFFFF;     /* White */
}
```

### Content

- Edit `index.php` for page content
- Edit `templates/header.php` for navigation
- Edit `templates/footer.php` for footer content

## SEO

- Schema.org LocalBusiness JSON-LD in header
- Meta tags (Open Graph, Twitter Cards)
- Sitemap.xml
- Robots.txt

## Performance

- GZIP compression enabled
- Browser caching configured
- CSS/JS versioning to prevent cache issues
- Optimized images

## Security

- Honeypot spam protection
- Rate limiting (1 submission per minute)
- Input validation and sanitization
- Security headers in .htaccess

## Support

For issues or questions, contact: contact@taxpro.au

## License

Proprietary - All rights reserved

