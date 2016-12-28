<?php
require_once(__DIR__.'/../module/Connection.php');
require_once(__DIR__.'/../dao/CityDAO.php');
require_once(__DIR__.'/../entity/City.php');

// Db Things
$connection = Connection::getInstance();
$city_DAO = new CityDAO($connection);

// SQL Request
$pattern = $_GET['search'];
$response = $city_DAO->search($pattern);

// Processing Data
foreach ($response as $key => $value) {
    $response[$key] = $value->toArray();
}

// Return Data
header('Content-type: application/json; charset=utf-8');
echo json_encode($response);