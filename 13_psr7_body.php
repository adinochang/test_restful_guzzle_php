<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;


$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

// get body size
echo('Body size : ' . $guzzleResponse->getBody()->getSize() . PHP_EOL);

// get first 20 bytes of response.
echo($guzzleResponse->getBody()->read(20) . PHP_EOL);

// get next 20 bytes of response
echo($guzzleResponse->getBody()->read(20) . PHP_EOL);