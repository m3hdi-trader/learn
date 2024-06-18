<?php

use App\Database\PdoDatabaseConnection;
use App\Helpers\Config;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;


require_once __DIR__ . '/../../vendor/autoload.php';


$config = Config::get("database", "pdo_testing");

$pdoConnection = new PdoDatabaseConnection($config);
$queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());

$queryBilder->truncateAllTable();
