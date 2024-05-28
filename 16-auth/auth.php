<?php

require "bootstrap/init.php";


if (isloggedIn()) {
    redirect();
}

deleteExpiredToken();
#region Logic Register | Verify |Login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    //Register
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

    //Verify
    if ($action == "verify") {
        $token = findTokenByHash($_SESSION['hash'])->token;

        if ($token === $params['token']) {
            $session = bin2hex(random_bytes(32));
            changeLoginSession($_SESSION['email'], $session);
            setcookie('auth', $session, time() + 1728000, '/');
            deleteTokenByHash($_SESSION['hash']);
            unset($_SESSION['hash'], $_SESSION['email']);
            redirect();
        } else {
            setErrorAndRedirect('Token is worng!', 'auth.php?action=verify');
        }
    }
    //Login
    if ($action == 'login') {
        if (empty($params['email'])) {
            setErrorAndRedirect('Email is required!', 'auth.php?action=login');
        }
        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            setErrorAndRedirect('Enter valid email adderss! ', 'auth.php?action=login');
        }

        if (!isUserExists($params['email'])) {
            setErrorAndRedirect('Users Not exists with this email! <br> ' . $params['email'], 'auth.php?action=login');
        }
        $_SESSION['email'] = $params['email'];
        redirect('auth.php?action=verify');
    }
}
#endregion Register | Verify |Login


#region Check User Exist | Send Token By Email
if (isset($_GET['action']) && $_GET['action'] == 'verify' && !empty($_SESSION['email'])) {
    //Check User Exist
    if (!isUserExists($_SESSION['email'])) {
        setErrorAndRedirect('Users not exists with this data!', 'auth.php?action=login');
    }
    //Send Token
    if (isset($_SESSION['hash']) && isAliveToken($_SESSION['hash'])) {
        sendTokenByEmail($_SESSION['email'], findTokenByHash($_SESSION['hash'])->token);
    } else {
        $tokenResult = creatLoginToken();
        sendTokenByEmail($_SESSION['email'], $tokenResult['token']);
        $_SESSION['hash'] = $tokenResult['hash'];
    }

    include 'tpl/verify-tpl.php';
}
#endregion Check User Exist | Send Token By Email


#region Show Page Register | Login
if (isset($_GET['action']) && $_GET['action'] == 'register') {
    include 'tpl/register-tpl.php';
} else {
    include 'tpl/login-tpl.php';
}
#endregion Show Page Register | Login
