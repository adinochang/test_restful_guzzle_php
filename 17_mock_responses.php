<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

// a handler that returns mocked responses
// takes an array of responses to return, and throws OutOfBoundsException when it has no more responses to return
$mock = new MockHandler([
    new Response(200), // an empty response with no headers
    new Response(200, ['X-Foo' => 'test']), // returns a response with X-Foo: test header,
    new ClientException('ClientException Error', new Request('GET', 'test')), // return a Exception for testing
]);

// setup a handler for GET requests
$handler = HandlerStack::create($mock);
$client = new Client([
    'handler' => $handler   ,
]);

echo ($client->request('GET', '/')->getStatusCode() . PHP_EOL);
var_dump($client->request('GET', '/')->getHeader('X-Foo'));

try {
    echo ($client->request('GET', '/')->getStatusCode() . PHP_EOL);
} catch (ClientException $exception) {
    echo ('Error : ' . $exception->getMessage() . PHP_EOL);
}

// triggers OutOfBoundsException because we only had 3 mock handlers
try {
    echo ($client->request('GET', '/')->getStatusCode() . PHP_EOL);
} catch (Exception $exception) {
    echo ('Error : ' . $exception->getMessage() . PHP_EOL);
}