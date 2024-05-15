<?php
// https://stackoverflow.com/questions/10753024/how-to-access-the-command-line-for-xampp-on-windows

$mysqli = new mysqli("localhost", "root", "", "world");

if ($mysqli->connect_errno) {
    echo "Failed to connect to mysql erroor: " . $mysqli->connect_error .PHP_EOL;
    exit;
}
echo "successfully connected to mysql".PHP_EOL;

$mysqli->set_charset("utf8");
