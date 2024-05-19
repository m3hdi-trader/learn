<?php

include "constans.php";
include "config.php";
include "libs/helper.php";
include "libs/lib-auto.php";


$dsn = "mysql:dbname=$databas_config->db;host:={$databas_config->host}";

try {
    $pdo = new pdo($dsn, $databas_config->user, $databas_config->pass);
} catch (PDOException $pe) {
    diePage($pe->getMessage());
}
include "libs/lib-tacks.php";
include "vendor/autoload.php";

// echo "connection to database ok!";
