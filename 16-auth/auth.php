<?php

require "bootstrap/init.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';


if (isset($_GET['action']) && $_GET['action'] == 'register') {
    include 'tpl/register-tpl.php';
} else {
    include 'tpl/login-tpl.php';
}
