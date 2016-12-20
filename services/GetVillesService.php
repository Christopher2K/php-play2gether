<?php
require_once('../module/Connection.php');
require_once('../entity/Ville.php');
require_once('../dao/VilleDAO.php');


// Db Things
$connection = Connection::getInstance();
$ville_dao = new VilleDAO($connection);

// SQL Request
$pattern = $_GET['search'];
$response = $ville_dao->selectByName($pattern);

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode(utf8ize($response));
