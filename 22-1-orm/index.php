<?php

use App\Helpers\Config;

require_once "./vendor/autoload.php";

$result = Config::get('database');
var_dump($result);
