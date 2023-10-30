<?php

require_once('../vendor/autoload.php');

use Bulbakh\Rafinita\Client;

$apiUrl = 'https://dev-api.rafinita.com/post';

$clientKey = '5b6492f0-f8f5-11ea-976a-0242c0a85007';
$email = 'example@example.com';
$pass = 'd0ec0beca8a3c30652746925d5380cf3';

$client = new Client($clientKey, $email, $pass);

$params = [
    'order_id' => 'ORDER-' . time(),
    'order_amount' => '1.99',
    'order_currency' => 'USD',
    'order_description' => 'Product',
    'card_number' => '4111111111111111',
    'card_exp_month' => '01',
    'card_exp_year' => '2025',
    'card_cvv2' => '000',
    'payer_first_name' => 'Joe',
    'payer_last_name' => 'Biden',
    'payer_address' => 'White House',
    'payer_country' => 'US',
    'payer_city' => 'City',
    'payer_zip' => '123456',
    'payer_phone' => '199999999',
    'payer_ip' => '123.123.123.123',
    'term_url_3ds' => 'https://client.site.com/return.php',
];

try {
    $response = $client->doRequest($apiUrl, 'SALE', $params);
    echo '<pre>';
    print_r(json_decode($response));
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
