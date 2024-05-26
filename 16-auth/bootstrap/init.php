<?php
require 'constans.php';
require 'config.php';


$pdo = new PDO(
    "mysql:host=$dataBaseConfig->host;dbname=$dataBaseConfig->dbname;charset=$dataBaseConfig->charset",
    username: $dataBaseConfig->user,
    password: $dataBaseConfig->password
);

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

echo "<pre>";
var_dump($pdo);
echo "</pre>";
