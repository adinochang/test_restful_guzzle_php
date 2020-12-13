<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;


$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

echo($guzzleResponse->getStatusCode() . PHP_EOL);   // 200
echo($guzzleResponse->getReasonPhrase() . PHP_EOL); // OK

// modify the status code of the response, then assign it back to the $guzzleResponse variable
$guzzleResponse = $guzzleResponse->withStatus(418);

echo($guzzleResponse->getStatusCode() . PHP_EOL);   // 418
echo($guzzleResponse->getReasonPhrase() . PHP_EOL); // I'm a teapot

// modify the status code AND message of the response
$guzzleResponse = $guzzleResponse->withStatus(419, 'Coffee is better than tea');

echo($guzzleResponse->getStatusCode() . PHP_EOL);   // 419
echo($guzzleResponse->getReasonPhrase() . PHP_EOL); // empty string