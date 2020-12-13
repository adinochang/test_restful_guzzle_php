<?php
/* 1. PSR-7
 * - PHP Standards Recommendations version 7
 * - Made by PHP-FIG makes standard recommendations
 * - Interfaces are immutable (cannot be changed)
 *
 * 2. Standard HTTP interfaces:
 * - MessageInterface : HTTP requests and responses
 * - RequestInterface : Builds on MessageInterface for HTTP-client requests
 * - ResponseInterface : Builds on MessageInterface for outgoing server-side responses
 * - ServerRequestInterface : Builds on MessageInterface for server-side requests
 * - StreamInterface : For PHP data streams to generate or receive files larger than memory size
 * - UploadedFileInterface : For files uploaded and received
 * - UriInterface : Common interface of URIs
 *
 * 3. PSR-7 enables us to build middleware
 * - Code that interacts with a request or response without having to spin up the entire application
 * - Example : Exceptions, Authorization
 */

require 'vendor/autoload.php';
use GuzzleHttp\Psr7\Request;

$psr7Request = new Request(
    'GET', // verb
    'http://jsonplaceholder.typicode.com/posts/1' // URL
);

echo($psr7Request->getUri() . PHP_EOL);
echo($psr7Request->getUri()->getScheme() . PHP_EOL);
echo($psr7Request->getUri()->getPort() . PHP_EOL);
echo($psr7Request->getUri()->getHost() . PHP_EOL);
echo($psr7Request->getUri()->getPath() . PHP_EOL);