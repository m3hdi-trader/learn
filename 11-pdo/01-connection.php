<?php
// https://stackoverflow.com/questions/10753024/how-to-access-the-command-line-for-xampp-on-windows
include_once "lib.php";



list($host, $database, $user, $pass) = ["localhost", "world", "root", ""];

try {
    $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echoLine("successfully Connected to mysql");
} catch (PDOException $e) {
    echoLine("PDO Error:Failed to Connect: " . $e->getMessage());
    exit();
}


#get attributes
// echoLine($db->getAttribute(PDO::ATTR_CONNECTION_STATUS))

