<?php
/*
 * Documentation : http://docs.guzzlephp.org/
 *
 * Install Guzzle:
 * composer require guzzlehttp/guzzle:^6.0
 *
*/

//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

// make a request
$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

// var_dump($guzzleResponse);

echo($guzzleResponse->getStatusCode() . PHP_EOL);
echo($guzzleResponse->getBody() . PHP_EOL);
