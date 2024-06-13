<?php

namespace App\Helpers;

use App\Exceptions\ConfigFileNotFoundException;

use function PHPUnit\Framework\returnArgument;

class Config
{
    public static function getFileContents(string $fileName)
    {
        $filePaht = realpath(__DIR__ . "/../Configs/" . $fileName . ".php");
        if (!$filePaht) {
            throw new ConfigFileNotFoundException();
        }

        $fileContents = require($filePaht);
        return $fileContents;
    }

    public static function get(string $fileName, string $key = null)
    {
        $fileContents = self::getFileContents($fileName);
        if (is_null($key)) return $fileContents;
        return $fileContents[$key] ?? null;
    }
}
