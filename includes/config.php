<?php
/**
 * Main Configuration - TaxPro.au PHP
 * Compatible with Hostinger shared hosting
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400 * 30); // 30 days
    ini_set('session.cookie_path', '/');
    ini_set('session.cookie_httponly', 1);
    session_start();
}

// Base configuration
define('SITE_NAME', 'TaxPro.au');
define('SITE_URL', 'https://taxpro.au');
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('TEMPLATES_PATH', BASE_PATH . '/templates');
define('STATIC_PATH', BASE_PATH . '/static');

// Contact configuration
define('CONTACT_EMAIL', 'contact@taxpro.au');
define('CONTACT_PHONE', '1300 19 19 30');

// Google Sheets API Configuration
// Path to service account JSON file (upload to server, outside public_html)
define('GOOGLE_SHEETS_CREDENTIALS', BASE_PATH . '/google-sheets-credentials.json');
define('GOOGLE_SHEETS_SPREADSHEET_ID', ''); // To be configured
define('GOOGLE_SHEETS_RANGE', 'Sheet1!A:E'); // Columns: Timestamp, First Name, Last Name, Email, Firm Name, Phone

// Telegram Bot Configuration
define('TELEGRAM_BOT_TOKEN', ''); // To be configured
define('TELEGRAM_CHAT_ID', ''); // To be configured (your Telegram chat ID)

// Timezone
date_default_timezone_set('Australia/Sydney');

// Encoding
mb_internal_encoding('UTF-8');

// Include required files
require_once INCLUDES_PATH . '/functions.php';

