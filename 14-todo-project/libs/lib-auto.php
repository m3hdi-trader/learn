<?php
defined('BASE_PATH') or die("Permision Denied!");
#Auth Function
function getCurrentUserId()
{
    return 1;
}

function isLoggedIn()
{
    return false;
}

function login($user, $password)
{
    return 1;
}

function register($userData)
{
    global $pdo;
    $pass = password_hash($userData['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO `users` (name,email,password) VALUES (:name,:email,:pass); ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $userData['name'], ':email' => $userData['email'], ':pass' => $pass]);
    return $stmt->rowCount() ? true : false;
}
