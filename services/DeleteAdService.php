<?php
require_once(__DIR__ . '/../module/Session.php');
require_once(__DIR__ . '/../module/Connection.php');

require_once(__DIR__ . '/../dao/AdDAO.php');
require_once(__DIR__ . '/../entity/Ad.php');
require_once(__DIR__ . '/../entity/User.php');


$session = Session::getInstance();
$connexion = Connection::getInstance();

$user = $session->readSession('user');
$ad_dao = new AdDAO($connexion);

if ($user) {
    $ad = $ad_dao->select(['id_ad' => $_POST[ 'ad_id' ]])[ 0 ];
    if ($ad->isCreator($user)) {

        if ($ad_dao->delete($ad)) {
            $response [ 'status' ] = 'success';
        } else {
            $response [ 'status' ] = 'error';
        }

    } else {
        $response [ 'status' ] = 'user_not_creator';
    }


} else {
    $response[ 'status' ] = 'user_not_logged';
}


header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

