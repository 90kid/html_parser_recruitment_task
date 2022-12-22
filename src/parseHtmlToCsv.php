<?php
require "vendor/autoload.php";

use Dawid\HtmlParser\CsvSaver\CsvSaver;
use Dawid\HtmlParser\HtmlParser\GivenHtmlPageParser;
use Dawid\HtmlParser\Models\GivenHtmlPage;
use PHPHtmlParser\Dom;


$filePath = $argv[1] ?? 'example.html';
$dom = new Dom;
$dom->loadFromFile('example.html');

$htmlParser = new GivenHtmlPageParser(new GivenHtmlPage(), $dom);
CsvSaver::saveToCsv('output.csv', $htmlParser->getAllData());
