<?php

include "bootstrap/init.php";

$homeUrl = siteUrl();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $action = $_GET['action'];
    $params = $_POST;

    if ($action == 'register') {

        $result = register($params);

        if (!$result) {
            message("Error: an error in registeration!", 'red');
        } else {
            message("Registeration is successfully .<br> <a href='{$homeUrl}auth.php'>Please Login<a/> ");
        }
    } elseif ($action == 'login') {

        $result = login($params['email'], $params['password']);

        if (!$result) {
            message("Error: Email or Password is incorrect!", 'red');
        } else {
            message('You Are Now Logged in');
            header("Location:" . siteUrl());
        }
    }
}


include "tpl/tpl-auth.php";
