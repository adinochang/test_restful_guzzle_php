<?php
//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

// make a request
$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts', // URL
    [
        'query' => ['userId' => 1],
    ] // options
);

echo($guzzleResponse->getStatusCode() . PHP_EOL);
echo($guzzleResponse->getBody() . PHP_EOL);
