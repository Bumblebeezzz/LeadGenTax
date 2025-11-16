<?php
/**
 * Contact API Endpoint - TaxPro.au
 * Handles POST requests from contact form
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../includes/contact_handler.php';

// Process form submission
$result = process_contact_form();

// Return JSON response
echo json_encode($result);
exit;

