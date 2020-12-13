<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;


$guzzleClient = new Client();

$guzzleResponse = $guzzleClient->request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

// hasHeader argument is case-insensitive
if ($guzzleResponse->hasHeader('content-type')) {
    // getHeader argument is case-insensitive and returns an array
    echo implode(', ', $guzzleResponse->getHeader('content-type')) . PHP_EOL;
    // output : application/json; charset=utf-8

    // use Psr7 parse_header to convert the header to an array
    $header = GuzzleHttp\Psr7\Header::parse($guzzleResponse->getHeader('content-type'));
    var_dump($header);

    // use a header value to make a decision
    foreach($header as $value) {
        if(array_key_exists('charset', $value)) {
            echo ($value['charset'] . PHP_EOL);
        }
    }
}