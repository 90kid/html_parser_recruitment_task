<?php
require "vendor/autoload.php";

use Dawid\HtmlParser\CsvSaver\CsvSaver;
use Dawid\HtmlParser\HtmlParser\GivenHtmlPageParser;
use Dawid\HtmlParser\Models\GivenHtmlPage;
use PHPHtmlParser\Dom;
use PHPHtmlParser\Exceptions\ChildNotFoundException;
use PHPHtmlParser\Exceptions\CircularException;
use PHPHtmlParser\Exceptions\ContentLengthException;
use PHPHtmlParser\Exceptions\LogicalException;
use PHPHtmlParser\Exceptions\StrictException;

$dom = new Dom;
//try {
//    $dom->loadFromFile('example.html');
//} catch (ChildNotFoundException|CircularException|ContentLengthException|LogicalException|StrictException $e) {
//    echo 'Something goes wrong!';
//    throw $e;
//}
$dom->loadFromFile('example.html');

$htmlParser = new GivenHtmlPageParser(new GivenHtmlPage(), $dom);
CsvSaver::saveToCsv('output.csv', $htmlParser->getAllData());
