<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

$body = $guzzleResponse->getBody();
$content = $body->getContents();
$json = json_decode($content);

var_dump($json);

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/users/' . $json->userId // URL
);

var_dump(json_decode($guzzleResponse->getBody()));


echo($guzzleResponse->getStatusCode() . PHP_EOL);   // 200
echo($guzzleResponse->getReasonPhrase() . PHP_EOL); // OK

if($guzzleResponse->getStatusCode() !== 200) {
    echo('Failure'. PHP_EOL);
}