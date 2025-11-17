<?php
/**
 * Helper Functions - LeadGenTax.au
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
    $html .= "    <meta name=\"keywords\" content=\"accounting lead generation Sydney, tax client acquisition Australia, CPA lead gen Melbourne, accountant marketing Brisbane\">\n";
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
 * Generate LocalBusiness Schema JSON-LD with Services
 */
function generate_local_business_schema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => SITE_NAME,
        'telephone' => CONTACT_PHONE,
        'email' => CONTACT_EMAIL,
        'url' => SITE_URL,
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'AU',
            'addressLocality' => 'Sydney',
            'addressRegion' => 'NSW'
        ],
                'description' => 'Accounting lead generation services for CPAs in Sydney, Melbourne, Brisbane, Perth, Adelaide, Canberra, Hobart, Darwin & everywhere in Australia. Generate 30+ qualified tax leads per month with Google Ads, AI agents, and conversion-optimized websites.',
        'priceRange' => '$$',
        'areaServed' => [
            [
                '@type' => 'City',
                'name' => 'Sydney'
            ],
            [
                '@type' => 'City',
                'name' => 'Melbourne'
            ],
            [
                '@type' => 'City',
                'name' => 'Brisbane'
            ],
            [
                '@type' => 'Country',
                'name' => 'Australia'
            ]
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Accounting Lead Generation Services',
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Google Ads Management',
                        'description' => 'Targeted Google Ads campaigns for accounting firms. 14-day free trial available.',
                        'provider' => [
                            '@type' => 'LocalBusiness',
                            'name' => SITE_NAME
                        ],
                        'areaServed' => [
                            '@type' => 'Country',
                            'name' => 'Australia'
                        ]
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Website Development & Optimization',
                        'description' => 'Professional websites designed to convert visitors into tax clients.',
                        'provider' => [
                            '@type' => 'LocalBusiness',
                            'name' => SITE_NAME
                        ]
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'AI Response Services',
                        'description' => '24/7 automated customer support and lead qualification with Website AI Agent and Phone AI Agent.',
                        'provider' => [
                            '@type' => 'LocalBusiness',
                            'name' => SITE_NAME
                        ]
                    ]
                ]
            ]
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '220',
            'bestRating' => '5',
            'worstRating' => '1'
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

