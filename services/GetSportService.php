<?php
require_once(__DIR__.'/../module/Connection.php');
require_once(__DIR__.'/../dao/SportDAO.php');
require_once(__DIR__.'/../entity/Sport.php');

// Db Things
$connection = Connection::getInstance();
$sport_dao = new SportDAO($connection);

// SQL Request
$response = $sport_dao->select([]);

// Processing Data
foreach ($response as $key => $value) {
    $response[$key] = $value->toArray();
}

// Return Data
header('Content-type: application/json; charset=utf-8');
echo json_encode($response);