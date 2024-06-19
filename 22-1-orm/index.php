<?php

use App\Database\PdoDatabaseConnection;
use App\Database\PdoQueryBilder as DatabasePdoQueryBilder;
use App\Helpers\Config;

require_once "./vendor/autoload.php";

$config = Config::get('database', 'pdo_testing');

$pdoConnection = new PdoDatabaseConnection($config);
$queryBilder = new DatabasePdoQueryBilder($pdoConnection->connect());

function json_respons($data = null, $statusCode = 200)
{
    header_remove();
    header('Content-Type: application/json');
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

function request()
{
    return json_decode(file_get_contents('php://input'), true);
}
var_dump(request());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $queryBilder->table('bugs')->create(request());
    json_respons(null, 200);
}
