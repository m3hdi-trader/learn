<?php
include "vendor/autoload.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$alg = 'HS256';
$key = '7mohammad';
$payload = [
    'iss' => 'http://example.org',
    'aud' => 'http://example.com',
    'iat' => 1356999524,
    'nbf' => 1357000000,
    'user_id' => 7
];

//  create and sing jwt token
// $jwt = JWT::encode($payload, $key, $alg);

// echo $jwt . PHP_EOL;

$jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZXhhbXBsZS5vcmciLCJhdWQiOiJodHRwOi8vZXhhbXBsZS5jb20iLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwidXNlcl9pZCI6N30.S6nfd2v76TZ6sE6E8YsukfAK1Er_ACzME76styTT7kw";


// decode and verify jwt token

try {
    $jwtDecoded = JWT::decode($jwt, new Key($key, $alg));
    print_r($jwtDecoded);
} catch (Exception $e) {
    echo 'error: ' . $e->getMessage();
}
