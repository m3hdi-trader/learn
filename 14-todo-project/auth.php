<?php

include "bootstrap/init.php";

$homeUrl = siteUrl();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'register') {
        $result = register($params);
        if (!$result) {
            massage("Error: an error in registeration!");
        } else {
            massage("registeration is successfully .<br> <a href='$homeUrl'>Mange your task<a/> ");
        }
    } elseif ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            massage("Error: email or password is incorrect!");
        }
    }
}


include "tpl/tpl-auth.php";
