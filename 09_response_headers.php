<?php
//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$guzzleClient = new Client();
$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);
var_dump($guzzleResponse);

$headers = $guzzleResponse->getHeaders();
var_dump($headers);

$type = $guzzleResponse->getHeader('Content-Type');
if (in_array('application/json; charset=utf-8', $type)) {
    $body = json_decode($guzzleResponse->getBody());
} else {
    $body = $guzzleResponse->getBody();
}
var_dump($body);

