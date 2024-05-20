<?php

include "constans.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "libs/helper.php";
include BASE_PATH .  "libs/lib-auto.php";


$dsn = "mysql:dbname=$databas_config->db;host:={$databas_config->host}";

try {
    $pdo = new pdo($dsn, $databas_config->user, $databas_config->pass);
} catch (PDOException $pe) {
    diePage($pe->getMessage());
}
include BASE_PATH . "libs/lib-tacks.php";
include BASE_PATH . "vendor/autoload.php";

// echo "connection to database ok!";
