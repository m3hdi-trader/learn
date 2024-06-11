<?php
include '../../../loader.php';

use App\Services\CityService;
use App\Utilities\Response;
use App\Utilities\CacheUtilitiy;

// echo "salam" . rand(1, 999);


$requestMthode = $_SERVER['REQUEST_METHOD'];

$requestBody = json_decode(file_get_contents('php://input'), true);
$cityService = new CityService();


// Response::respondAndDie($requestBody);

switch ($requestMthode) {

    case 'GET':

        $cityService = new CityService();
        CacheUtilitiy::start();

        $provinceId = $_GET['province_id'] ?? null;
        #do validate :$province_id 🤷‍♂️🤦‍♂️
        $requestData = [
            'province_id' => $provinceId,
            'fields' => $_GET['fields'] ?? null,
            'orderby' => $_GET['orderby'] ?? null,
            'page' => $_GET['page'] ?? null,
            'pagesize' => $_GET['pagesize'] ?? null,

        ];
        $response = $cityService->getCities($requestData);
        if (empty($response)) {
            Response::respondAndDie($response, Response::HTTP_NOT_FOUND);
        } else {
            echo Response::respond($response, Response::HTTP_OK);
            CacheUtilitiy::end();
            die();
        }
        // ------------------------------------------------------------------------
    case 'POST':
        if (!isValidCity($requestBody)) {
            Response::respondAndDie(['Error: Invalid City data'], Response::HTTP_NOT_ACCEPTABLE);
        }

        $response = $cityService->creatCity($requestBody);
        Response::respondAndDie($response, Response::HTTP_CREATED);
        // ----------------------------------------------------------------------------
    case 'PUT':
        [$city_id, $name] = [$requestBody['city_id'], $requestBody['name']];
        if (!is_numeric($city_id) or empty($name)) {
            Response::respondAndDie(['Error: Invalid City data'], Response::HTTP_NOT_ACCEPTABLE);
        }

        $result = $cityService->updateCityName($city_id, $name);

        if ($result === 0) {
            Response::respondAndDie(['همچین شهری وجود ندارد'], Response::HTTP_OK);
        }
        Response::respondAndDie($result, Response::HTTP_OK);
        // ----------------------------------------------------------------------------

    case 'DELETE':
        $city_id = $_GET["city_id"] ?? null;
        $result = $cityService->deleteCity($city_id);
        if (!is_numeric($city_id) or is_null($city_id)) {
            Response::respondAndDie(['Error: Invalid City id'], Response::HTTP_NOT_ACCEPTABLE);
        }

        Response::respondAndDie($result, Response::HTTP_OK);
        // ----------------------------------------------------------------------------

    default:
        Response::respondAndDie(['Invalid Request Method'], Response::HTTP_METHOD_NOT_ALLOWED);
}
