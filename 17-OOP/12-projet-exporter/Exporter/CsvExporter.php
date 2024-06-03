<?php

namespace Exporter;

class CsvExporter extends Exporter
{
    protected $format = '.Csv';

    public  function  export()
    {
        $fileName = "Csv-file-" . rand(100, 999) . $this->format;
        $filePath = __DIR__ . "/files/$fileName";
        file_put_contents($filePath, "{$this->data['title']},{$this->data['content']}");
        echo "$fileName successfuly created!";
    }
}
