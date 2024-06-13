<?php

use App\Helpers\Config;

require_once "./vendor/autoload.php";

$result1 = Config::getFileContents('database');

echo '<pre>';
var_dump($result1);
echo '</pre>';


$result = Config::get('database');

echo '<pre>';
var_dump($result);
echo '</pre>';
