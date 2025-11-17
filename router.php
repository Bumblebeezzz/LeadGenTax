<?php
/**
 * Router for PHP built-in server
 * Handles clean URLs without .php extension
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400 * 30); // 30 days
    ini_set('session.cookie_path', '/');
    ini_set('session.cookie_httponly', 1);
    session_start();
}

$request_uri = $_SERVER['REQUEST_URI'];
$request_path = parse_url($request_uri, PHP_URL_PATH);

// Remove leading slash and query parameters
$request_path = ltrim($request_path, '/');

// If empty, it's the home page
if (empty($request_path) || $request_path === 'index.php' || $request_path === '/') {
    require __DIR__ . '/index.php';
    exit;
}

// Check if it's a static file (CSS, JS, images, etc.)
$static_extensions = ['.css', '.js', '.png', '.jpg', '.jpeg', '.gif', '.svg', '.ico', '.woff', '.woff2', '.ttf', '.xml', '.txt', '.mp4', '.webm', '.ogg', '.mov', '.json'];
$is_static = false;
foreach ($static_extensions as $ext) {
    if (strpos($request_path, $ext) !== false) {
        $is_static = true;
        break;
    }
}

if ($is_static) {
    $file_path = __DIR__ . '/' . $request_path;
    if (file_exists($file_path)) {
        // Set proper MIME type for video files
        if (strpos($request_path, '.mov') !== false) {
            header('Content-Type: video/quicktime');
        } elseif (strpos($request_path, '.mp4') !== false) {
            header('Content-Type: video/mp4');
        }
        return false; // Let PHP server serve the static file
    }
}

// Check if it's an API endpoint
if (strpos($request_path, 'api/') === 0) {
    $api_file = __DIR__ . '/' . $request_path;
    if (file_exists($api_file)) {
        require $api_file;
        exit;
    }
}

// Mapping of routes
$routes = [
    'about' => 'about.php',
    'services' => 'services.php',
    'case-studies' => 'case-studies.php',
    'testimonials' => 'testimonials.php',
    'contact' => 'contact.php',
];

// Check if it's a known route
if (isset($routes[$request_path])) {
    $file = __DIR__ . '/' . $routes[$request_path];
    if (file_exists($file)) {
        require $file;
        exit;
    }
}

// If the .php file exists directly, serve it
$php_file = __DIR__ . '/' . $request_path . '.php';
if (file_exists($php_file)) {
    require $php_file;
    exit;
}

// 404 - Redirect to home
header('Location: /');
exit;
