<?php
// test if requests were sent correctly

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

// middleware handler that stores a history of requests sent
$historyBucket = [];

// this will store a history of requests to the bucket
$historyMiddleware = Middleware::history($historyBucket);

// create MiddleWare
$stack = HandlerStack::create();
$stack->push($historyMiddleware);

// create a new instance of client using our Middleware stack
$client = new Client(['handler' => $stack]);

// test client request
$client->get('http://jsonplaceholder.typicode.com/posts/2');

// test client request with error. do not throw error on http_errors
$client->get('http://jsonplaceholder.typicode.com/posts/0', ['http_errors' => false]);

echo('count($historyBucket) : ' . count($historyBucket) . PHP_EOL);

// view history of what Guzzle uses to create request, handle requests, and create response
foreach($historyBucket as $item) {
    echo('request : ' . $item['request']->getUri() . PHP_EOL);
    echo('response : ' . $item['response']->getBody() . PHP_EOL);
}