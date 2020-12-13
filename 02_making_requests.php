<?php
//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

// set a base URI
$guzzleClient = new Client(
  ['base_uri' => 'http://jsonplaceholder.typicode.com/']
);

// a direct GET request
$guzzleResponse = $guzzleClient->get(
    'posts/1' // URL
);
var_dump($guzzleResponse);

$guzzleResponse = $guzzleClient->get(
    'comments/2' // URL
);
var_dump($guzzleResponse);

$guzzleResponse = $guzzleClient->get(
    'https://httpbin.org/ip' // override base URI
);
var_dump($guzzleResponse);
