<?php
//load the guzzle class
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$guzzleClient = new Client();

try {
    $guzzleResponse = $guzzleClient->request(
        'GET', // verb
        // 'http://jsonplaceholder.typicode.com/posts/x' // URL
        'https://httpbin.org/status/503' // URL
    );
    var_dump($guzzleResponse);
} catch(\GuzzleHttp\Exception\ClientException $clientException) {
    echo('Client Error' . PHP_EOL . $clientException->getCode() . PHP_EOL . $clientException->getMessage() . PHP_EOL);
} catch(\GuzzleHttp\Exception\ServerException $serverException) {
    echo('Server Error' . PHP_EOL . $serverException->getCode() . PHP_EOL . $serverException->getMessage() . PHP_EOL);
}


