<?php

require "bootstrap/init.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'register') {
        if (empty($params['name']) || empty($params['email']) || empty($params['phone'])) {
            setErrorAndRedirect('all input filed is required!', 'auth.php?action=register');
        }
        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            setErrorAndRedirect('Enter valid email adderss!', 'auth.php?action=register');
        }

        if (isUserExists($params['email'], $params['phone'])) {
            setErrorAndRedirect('Users exists with this data!', 'auth.php?action=register');
        }
        if (creatUser($params)) {
            $_SESSION['email'] = $params['email'];
            redirect('auth.php?action=verify');
        }
    }
}


if (isset($_GET['action']) && $_GET['action'] == 'verify' && !empty($_SESSION['email'])) {
    if (!isUserExists($_SESSION['email'])) {
        setErrorAndRedirect('Users not exists with this data!', 'auth.php?action=login');
    }
    if (isset($_SESSION['hash']) && isAliveToken($_SESSION['hash'])) {
        sendTokenByEmail($_SESSION['email'], findTokenByHash($_SESSION['hash'])->token);
    } else {
        $tokenResult = creatLoginToken();
        sendTokenByEmail($_SESSION['email'], $tokenResult['token']);

        $_SESSION['hash'] = $tokenResult['hash'];
    }

    include 'tpl/verify-tpl.php';
}




if (isset($_GET['action']) && $_GET['action'] == 'register') {
    include 'tpl/register-tpl.php';
} else {
    include 'tpl/login-tpl.php';
}
