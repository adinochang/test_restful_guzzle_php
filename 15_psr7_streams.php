<?php
// StreamInterface : For PHP data streams to generate or receive files larger than memory size
require 'vendor/autoload.php';
use GuzzleHttp\Psr7;

/*
Ways to generate stream
1. Pass in a string
2. Pass in a generator or iterator
3. An object with a toString method
4. A resource with an fopen call
*/

// pass in a string and read it
$stream = GuzzleHttp\Psr7\Utils::streamFor ('This is a sample string data');
echo($stream . PHP_EOL);
echo($stream->getSize() . PHP_EOL);
echo($stream->isReadable() . PHP_EOL);
echo($stream->isWritable() . PHP_EOL);
echo($stream->isSeekable() . PHP_EOL);

// write something to the stream
$stream->write('test');

// go back to the start of the stream
$stream->rewind();

echo($stream->read(5) . PHP_EOL);   // read 5 bytes
echo($stream->getContents() . PHP_EOL);   // read the rest of the content
echo($stream->eof() . PHP_EOL);  // is end of file?


