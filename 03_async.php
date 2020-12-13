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
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

$promise->then(
    function (Response $guzzleResponse) {
        echo($guzzleResponse->getBody() . PHP_EOL);
    }, // response
    function (RequestException $exception) {
        echo($exception->getMessage() . PHP_EOL);
    } // exception
);

// wait for async requests to return before proceeding with rest of code
$promise->wait();
