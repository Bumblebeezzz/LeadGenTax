<?php
/**
 * Helper Functions - TaxPro.au
 */

/**
 * Escape HTML output
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate meta tags for SEO
 */
function generate_meta_tags($title, $description, $image = '') {
    $site_name = SITE_NAME;
    $site_url = SITE_URL;
    
    if (empty($image)) {
        $image = $site_url . '/static/images/og-image.jpg';
    } elseif (strpos($image, 'http') !== 0) {
        $image = $site_url . $image;
    }
    
    $html = "\n";
    $html .= "    <meta name=\"description\" content=\"" . e($description) . "\">\n";
    $html .= "    <meta name=\"keywords\" content=\"accounting firm marketing, tax accountant marketing, small business accounting, Google Ads for accountants, AI receptionist\">\n";
    $html .= "    <meta name=\"author\" content=\"" . e($site_name) . "\">\n";
    $html .= "\n";
    $html .= "    <!-- Open Graph / Facebook -->\n";
    $html .= "    <meta property=\"og:type\" content=\"website\">\n";
    $html .= "    <meta property=\"og:url\" content=\"" . e($site_url) . "\">\n";
    $html .= "    <meta property=\"og:title\" content=\"" . e($title) . "\">\n";
    $html .= "    <meta property=\"og:description\" content=\"" . e($description) . "\">\n";
    $html .= "    <meta property=\"og:image\" content=\"" . e($image) . "\">\n";
    $html .= "\n";
    $html .= "    <!-- Twitter -->\n";
    $html .= "    <meta property=\"twitter:card\" content=\"summary_large_image\">\n";
    $html .= "    <meta property=\"twitter:url\" content=\"" . e($site_url) . "\">\n";
    $html .= "    <meta property=\"twitter:title\" content=\"" . e($title) . "\">\n";
    $html .= "    <meta property=\"twitter:description\" content=\"" . e($description) . "\">\n";
    $html .= "    <meta property=\"twitter:image\" content=\"" . e($image) . "\">\n";
    
    return $html;
}

/**
 * Generate LocalBusiness Schema JSON-LD
 */
function generate_local_business_schema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => SITE_NAME,
        'telephone' => CONTACT_PHONE,
        'url' => SITE_URL,
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'AU'
        ],
        'description' => 'Marketing solutions for accounting firms. AI Receptionist 24/7, Google Ads, and optimized websites to generate +25 appointments per year.',
        'priceRange' => '$$',
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Australia'
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

