<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

file_put_contents('debug.log', json_encode($_POST) . PHP_EOL, FILE_APPEND);
// file_put_contents('debug.log', "Response: " . json_encode(['snapToken' => $snapToken]) . PHP_EOL, FILE_APPEND);


require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

// Validasi data
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['error' => 'Invalid email format']);
    exit;
}
if (!isset($_POST['total']) || !is_numeric($_POST['total'])) {
    echo json_encode(['error' => 'Invalid total amount']);
    exit;
}
$items = json_decode($_POST['items'], true);
if (json_last_error() !== JSON_ERROR_NONE || empty($items)) {
    echo json_encode(['error' => 'Invalid items JSON']);
    exit;
}


/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php

Alternatively, if you are not using **Composer**, you can download midtrans-php library
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require
the file manually.

<!-- require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
// file_put_contents('debug.log', json_encode($_POST) . PHP_EOL, FILE_APPEND);


//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SERVER_KEY_MIDTRANS';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

if (empty($_POST['total']) || empty($_POST['items']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid email format']);
    exit;
}



$params = array(
    'transaction_details' => array(
        'order_id' => 'ORDER-' . time(),
        'gross_amount' => (int)$_POST['total'],
    ),
    'item_details' => json_decode($_POST['items'], true),
    'customer_details' => array(
        'first_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
    ),
);


try {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    echo json_encode(['snapToken' => $snapToken]);
} catch (Exception $e) {
    http_response_code(500); // Set status code HTTP
    echo json_encode(['error' => $e->getMessage()]);
}

// $snapToken = \Midtrans\Snap::getSnapToken($params);
// echo $snapToken;
// echo json_encode(['snapToken' => $snapToken]);




?>