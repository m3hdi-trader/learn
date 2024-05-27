<?php
require 'constans.php';
require 'config.php';
require BASE_PATH . 'libs/helpers.php';


try {
    $pdo = new PDO(
        "mysql:host=$dataBaseConfig->host;dbname=$dataBaseConfig->dbname;charset=$dataBaseConfig->charset",
        username: $dataBaseConfig->user,
        password: $dataBaseConfig->password
    );
} catch (PDOException $e) {
    echo "connection Failed" . $e->getMessage();
    die();
}
