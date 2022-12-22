<?php

namespace Dawid\HtmlParser\CsvSaver;

class CsvSaver
{
    public static function saveToCsv(string $fileName, array $data): void
    {
        $csvFile = fopen($fileName, 'w');
        fputcsv($csvFile, array_keys($data));
        fputcsv($csvFile, $data);
        fclose($csvFile);
    }
}