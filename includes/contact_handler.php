<?php
/**
 * Contact Form Handler - TaxPro.au
 * Validates form data and sends to Google Sheets + Telegram
 */

require_once __DIR__ . '/config.php';

/**
 * Validate contact form data
 */
function validate_contact_form($data) {
    $errors = [];
    
    // Validate first name
    if (empty($data['first_name']) || strlen(trim($data['first_name'])) < 2) {
        $errors['first_name'] = 'First name must contain at least 2 characters';
    }
    
    // Validate last name
    if (empty($data['last_name']) || strlen(trim($data['last_name'])) < 2) {
        $errors['last_name'] = 'Last name must contain at least 2 characters';
    }
    
    // Validate email
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email address';
    }
    
    // Honeypot protection (hidden field)
    if (!empty($data['website'])) {
        $errors['spam'] = 'Spam detected';
    }
    
    // Rate limiting (check recent submissions)
    if (isset($_SESSION['last_contact_submission'])) {
        $time_diff = time() - $_SESSION['last_contact_submission'];
        if ($time_diff < 60) { // 1 minute between submissions
            $errors['rate_limit'] = 'Please wait before submitting again';
        }
    }
    
    return $errors;
}

/**
 * Send data to Google Sheets via API
 */
function send_to_google_sheets($data) {
    if (empty(GOOGLE_SHEETS_SPREADSHEET_ID) || !file_exists(GOOGLE_SHEETS_CREDENTIALS)) {
        return false;
    }
    
    try {
        // Load credentials
        $credentials_content = file_get_contents(GOOGLE_SHEETS_CREDENTIALS);
        if (!$credentials_content) {
            error_log('Google Sheets: Cannot read credentials file');
            return false;
        }
        
        $credentials = json_decode($credentials_content, true);
        if (!$credentials || !isset($credentials['client_email']) || !isset($credentials['private_key'])) {
            error_log('Google Sheets: Invalid credentials format');
            return false;
        }
        
        // Get access token using service account JWT
        $token_url = 'https://oauth2.googleapis.com/token';
        $jwt = create_jwt($credentials);
        
        if (!$jwt) {
            error_log('Google Sheets: Failed to create JWT');
            return false;
        }
        
        $token_data = [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ];
        
        $ch = curl_init($token_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $token_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code !== 200) {
            error_log('Google Sheets: Token request failed with code ' . $http_code);
            return false;
        }
        
        $token_json = json_decode($token_response, true);
        if (!isset($token_json['access_token'])) {
            error_log('Google Sheets: No access token in response');
            return false;
        }
        
        $access_token = $token_json['access_token'];
        
        // Prepare data for Sheets
        $timestamp = date('Y-m-d H:i:s');
        $values = [[
            $timestamp,
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['firm_name'] ?? '',
            $data['phone'] ?? ''
        ]];
        
        $sheets_url = 'https://sheets.googleapis.com/v4/spreadsheets/' . GOOGLE_SHEETS_SPREADSHEET_ID . '/values/' . GOOGLE_SHEETS_RANGE . ':append?valueInputOption=RAW';
        
        $sheets_data = [
            'values' => $values
        ];
        
        $ch = curl_init($sheets_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sheets_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $sheets_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code !== 200) {
            error_log('Google Sheets: API request failed with code ' . $http_code);
            return false;
        }
        
        $response_json = json_decode($sheets_response, true);
        return $response_json !== null && isset($response_json['updates']);
        
    } catch (Exception $e) {
        error_log('Google Sheets error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Create JWT for Google OAuth
 */
function create_jwt($credentials) {
    if (!function_exists('openssl_sign')) {
        error_log('Google Sheets: OpenSSL extension not available');
        return false;
    }
    
    $header = [
        'alg' => 'RS256',
        'typ' => 'JWT'
    ];
    
    $now = time();
    $claim = [
        'iss' => $credentials['client_email'],
        'scope' => 'https://www.googleapis.com/auth/spreadsheets',
        'aud' => 'https://oauth2.googleapis.com/token',
        'exp' => $now + 3600,
        'iat' => $now
    ];
    
    $header_encoded = base64url_encode(json_encode($header));
    $claim_encoded = base64url_encode(json_encode($claim));
    
    $signature_input = $header_encoded . '.' . $claim_encoded;
    
    // Handle private key format (may include newlines)
    $private_key_content = $credentials['private_key'];
    if (strpos($private_key_content, '-----BEGIN PRIVATE KEY-----') === false) {
        // If not in PEM format, try to construct it
        $private_key_content = "-----BEGIN PRIVATE KEY-----\n" . 
                              chunk_split($private_key_content, 64, "\n") . 
                              "-----END PRIVATE KEY-----\n";
    }
    
    $private_key = openssl_pkey_get_private($private_key_content);
    if (!$private_key) {
        error_log('Google Sheets: Failed to load private key - ' . openssl_error_string());
        return false;
    }
    
    $signature = '';
    if (!openssl_sign($signature_input, $signature, $private_key, OPENSSL_ALGO_SHA256)) {
        error_log('Google Sheets: Failed to sign JWT - ' . openssl_error_string());
        openssl_free_key($private_key);
        return false;
    }
    
    openssl_free_key($private_key);
    
    $signature_encoded = base64url_encode($signature);
    
    return $signature_input . '.' . $signature_encoded;
}

/**
 * Base64 URL encode
 */
function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

/**
 * Send notification to Telegram
 */
function send_to_telegram($data) {
    if (empty(TELEGRAM_BOT_TOKEN) || empty(TELEGRAM_CHAT_ID)) {
        return false;
    }
    
    $message = "🔔 *New Lead from TaxPro.au*\n\n";
    $message .= "👤 *Name:* " . $data['first_name'] . " " . $data['last_name'] . "\n";
    $message .= "📧 *Email:* " . $data['email'] . "\n";
    if (!empty($data['firm_name'])) {
        $message .= "🏢 *Firm:* " . $data['firm_name'] . "\n";
    }
    if (!empty($data['phone'])) {
        $message .= "📞 *Phone:* " . $data['phone'] . "\n";
    }
    $message .= "\n⏰ " . date('Y-m-d H:i:s');
    
    $telegram_url = 'https://api.telegram.org/bot' . TELEGRAM_BOT_TOKEN . '/sendMessage';
    
    $telegram_data = [
        'chat_id' => TELEGRAM_CHAT_ID,
        'text' => $message,
        'parse_mode' => 'Markdown'
    ];
    
    $ch = curl_init($telegram_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($telegram_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $response_json = json_decode($response, true);
    return isset($response_json['ok']) && $response_json['ok'] === true;
}

/**
 * Process contact form submission
 */
function process_contact_form() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['success' => false, 'message' => 'Method not allowed'];
    }
    
    // Get and clean data
    $data = [
        'first_name' => isset($_POST['first_name']) ? trim($_POST['first_name']) : '',
        'last_name' => isset($_POST['last_name']) ? trim($_POST['last_name']) : '',
        'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
        'firm_name' => isset($_POST['firm_name']) ? trim($_POST['firm_name']) : '',
        'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
        'website' => isset($_POST['website']) ? $_POST['website'] : '' // Honeypot
    ];
    
    // Validate
    $errors = validate_contact_form($data);
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Send to Google Sheets
    $sheets_sent = send_to_google_sheets($data);
    
    // Send to Telegram
    $telegram_sent = send_to_telegram($data);
    
    // Consider success if at least one method worked
    if ($sheets_sent || $telegram_sent) {
        // Record timestamp for rate limiting
        $_SESSION['last_contact_submission'] = time();
        
        return [
            'success' => true,
            'message' => 'Thank you! We will contact you within 24 hours.'
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Error sending your request. Please try again later or contact us directly.'
        ];
    }
}

