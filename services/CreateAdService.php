<?php
require_once(__DIR__ . '/../module/Connection.php');
require_once(__DIR__ . '/../module/Session.php');

require_once(__DIR__ . '/../entity/User.php');
require_once(__DIR__ . '/../entity/Ad.php');

require_once(__DIR__ . '/../dao/AdDAO.php');
require_once(__DIR__ . '/../dao/UserDAO.php');


// Session
$session = Session::getInstance();
$user = $session->readSession('user');

// Db Things
$connection = Connection::getInstance();
$ad_dao = new AdDAO($connection);
$user_dao = new UserDAO($connection);

// Record (DATA ARE ALREADY NAMED IS THE $_POST VARIABLE)
$ad = new Ad($_POST);

// Save only if user is logged
if ($session->userIsLogged()) {
    $ad->setCreatorFk($user->getIdUser());
    $last_ad_id = $ad_dao->create($ad);

    // Save test
    if ($last_ad_id) {
        // Save the current user for participating
        if ($user_dao->addUserAd($user, $last_ad_id)) {
            $response[ 'status' ] = 'success';
            $response[ 'id_ad' ] = $last_ad_id;
        } else {
            $response [ 'error' ] = 'cannot save the ad for the user';
            $response [ 'status' ] = 'error';
        }
    } else {
        $response [ 'error' ] = 'cannot save the ad';
        $response [ 'status' ] = 'error';
    }
} else {
    $response[ 'status' ] = 'user_not_logged';
}


// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);