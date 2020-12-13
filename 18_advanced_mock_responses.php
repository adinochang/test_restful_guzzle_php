<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

// create a response body
$body = json_encode([
    'id' => 10,
    'name' => 'sample',
]);

// a handler that returns mocked responses
// takes an array of responses to return, and throws OutOfBoundsException when it has no more responses to return
$mock = new MockHandler([
    new Response(200,
                 ['X-Foo' => 'test'],
                 $body
    ), // an empty response with no headers
]);

// setup a handler for GET requests
$handler = HandlerStack::create($mock);
$client = new Client([
    'handler' => $handler   ,
]);

$response = $client->request('GET', '/');

echo ($response->getStatusCode() . PHP_EOL);
var_dump ($response->getHeaders());
echo ($response->getBody() . PHP_EOL);