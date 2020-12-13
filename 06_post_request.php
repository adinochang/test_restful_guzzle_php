<?php
//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

// make a POST request
$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'POST', // verb
    'http://jsonplaceholder.typicode.com/posts', // URL
    [
        'json' => [
            'title' => 'Guzzle and REST',
            'body' => 'Guzzle makes working with REST APIs easy.',
            'userId' => 2,
        ],
    ] // options
);

// var_dump($guzzleResponse);

echo($guzzleResponse->getStatusCode() . PHP_EOL);
echo($guzzleResponse->getBody() . PHP_EOL);
