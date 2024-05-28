<?php
session_start();
date_default_timezone_set('Asia/Tehran');
require 'constans.php';
require BASE_PATH . 'vendor/autoload.php';
require 'config.php';
require BASE_PATH . 'libs/helpers.php';
require BASE_PATH . 'libs/auth-lib.php';
require 'mail.php';


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
