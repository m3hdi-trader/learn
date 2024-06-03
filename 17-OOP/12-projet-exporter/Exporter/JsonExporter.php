<?php

namespace Exporter;

class JsonExporter extends Exporter
{
    protected $format = '.json';

    public  function  export()
    {
        $fileName = "text-file-" . rand(100, 999) . $this->format;
        $filePath = __DIR__ . "/files/$fileName";
        file_put_contents($filePath, json_encode($this->data));
        echo "$fileName successfuly created!";
    }
}
