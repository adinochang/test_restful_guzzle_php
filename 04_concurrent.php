<?php
//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

// Make an async request
// It returns a promise instead of a response
$guzzleClient = new Client();
$promise = $guzzleClient->requestAsync(
    'GET', // verb
    'https://httpbin.org/ip' // URL
);
$promise2 = $guzzleClient->requestAsync(
    'GET', // verb
    'https://httpbin.org/ip' // URL
);


// make multiple requests
$promises = [$promise, $promise2];

$results = GuzzleHttp\Promise\settle($promises)->wait();

foreach($results as $result) {
    if (isset($result)) {
        echo($result['value']->getBody() . PHP_EOL);
    }
}
