<?php
/**
 * Header Template - TaxPro.au PHP
 * Include this file at the beginning of each page
 */

// Set default variables if not defined
if (!isset($page_title)) {
    $page_title = SITE_NAME . ' - Marketing for Accounting Firms | +25 Appointments/Year';
}
if (!isset($page_description)) {
    $page_description = 'AI Receptionist 24/7 + Google Ads + Optimized Website. Generate +25 appointments per year for your accounting firm. Free 14-day audit.';
}
if (!isset($page_image)) {
    $page_image = '';
}

$current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$is_home = ($current_path === '/' || $current_path === '/index.php' || empty($current_path));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($page_title); ?></title>
    <?php echo generate_meta_tags($page_title, $page_description, $page_image); ?>
    <link rel="icon" type="image/svg+xml" href="/static/images/favicon.svg">
    <link rel="shortcut icon" type="image/svg+xml" href="/static/images/favicon.svg">
    <link rel="apple-touch-icon" href="/static/images/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/images/favicon-16x16.png">
    
    <!-- Google Fonts - Playfair Display + Lora -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lora:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/static/css/style.css?v=<?php echo time(); ?>&nocache=<?php echo rand(1000, 9999); ?>">
    <link rel="stylesheet" href="/static/css/animations.css?v=<?php echo time(); ?>&nocache=<?php echo rand(1000, 9999); ?>">
    <link rel="stylesheet" href="/static/css/pricing.css?v=<?php echo time(); ?>&nocache=<?php echo rand(1000, 9999); ?>">
    <link rel="stylesheet" href="/static/css/results-table.css?v=<?php echo time(); ?>&nocache=<?php echo rand(1000, 9999); ?>">
    <link rel="stylesheet" href="/static/css/services-enhanced.css?v=<?php echo time(); ?>&nocache=<?php echo rand(1000, 9999); ?>">
    
    <?php echo generate_local_business_schema(); ?>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="/">
                    <img src="/static/images/logo-taxpro.svg" alt="<?php echo e(SITE_NAME); ?>" class="nav-logo">
                </a>
            </div>
            <div class="nav-menu" id="navMenu">
                <a href="/" class="nav-link <?php echo $is_home ? 'active' : ''; ?>">Home</a>
                <a href="/about" class="nav-link <?php echo strpos($current_path, '/about') !== false ? 'active' : ''; ?>">About</a>
                <a href="/services" class="nav-link <?php echo strpos($current_path, '/services') !== false ? 'active' : ''; ?>">Services</a>
                <a href="/case-studies" class="nav-link <?php echo strpos($current_path, '/case-studies') !== false ? 'active' : ''; ?>">Case Studies</a>
                <a href="/testimonials" class="nav-link <?php echo strpos($current_path, '/testimonials') !== false ? 'active' : ''; ?>">Testimonials</a>
                <a href="/contact" class="nav-link nav-cta">Free Audit</a>
            </div>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
