<?php
function isUserExists(string $email = null, string $phone = null): bool
{
    global $pdo;
    $sql = 'SELECT * FROM `users`WHERE`email`=:email OR `phone`=:phone;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email ?? '', ':phone' => $phone ?? '']);
    $record = $stmt->fetch(PDO::FETCH_OBJ);
    return $record ? true : false;
}


function creatUser(array $userData): bool
{
    global $pdo;

    $sql = 'INSERT INTO `users` (name,email,phone) VALUES(:name,:email,:phone)';

    $stmt = $pdo->prepare($sql);

    $stmt->execute([':name' => $userData['name'], ':email' => $userData['email'], ':phone' => $userData['phone']]);
    return $stmt->rowCount() ? true : false;
}


function creatLoginToken(): array
{
    global $pdo;
    $hash = bin2hex(random_bytes(8));
    $token = rand(100000, 999999);
    $expired_at = time() + 600;
    $sql = 'INSERT INTO `tokens` (token,hash,expired_at) VALUES(:token,:hash,:expired_at);';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':token' => $token, ':hash' => $hash, ':expired_at' => date("Y-m-d H-i-s", $expired_at)]);
    return [
        'token' => $token,
        'hash' => $hash
    ];
}


function isAliveToken(string $hash): bool
{
    $record = findTokenByHash($hash);
    if (!$record) {
        return false;
    }
    return strtotime($record->expired_at) > time() + 120;
}


function findTokenByHash(string $hash): object|bool
{
    global $pdo;
    $sql = 'SELECT * FROM `tokens` WHERE `hash`=:hash;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash' => $hash]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}


function sendTokenByEmail(string $email, string|int $token): bool
{
    global $phpmailer;
    $phpmailer->addAddress($email);
    $phpmailer->Subject = 'auth veify token';
    $phpmailer->Body = 'is Token : ' . $token;
    return $phpmailer->send();
}

function changeLoginSession(string $email, string $session = null): bool
{
    global $pdo;
    $sql = 'UPDATE `users` SET `session` = :session WHERE `email` =:email;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':session' => $session, ':email' => $email]);
    return $stmt->rowCount() ? true : false;
}


function deleteTokenByHash(string $hash): bool
{
    global $pdo;
    $sql = 'DELETE FROM `tokens`WHERE hash=:hash;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash' => $hash]);
    return $stmt->rowCount() ? true : false;
}



function getAuthenticateUserBySession(string $session): object|bool
{
    global $pdo;
    $sql = 'SELECT * FROM `users`WHERE `session`=:session;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':session' => $session]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function isloggedIn(): bool
{
    if (!isset($_COOKIE['auth'])) {
        return false;
    } else {
        return getAuthenticateUserBySession($_COOKIE['auth']) ? true : false;
    }
}


function deleteExpiredToken(): int
{
    global $pdo;
    $sql = 'DELETE FROM `tokens`WHERE expired_at<now();';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

function logout(string $email)
{
    changeLoginSession($email);
    setcookie('auth', '', time() - 60, '/');
    redirect('auth.php');
}
