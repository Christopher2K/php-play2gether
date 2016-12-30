<?php
require_once(__DIR__ . '/../module/Connection.php');
require_once(__DIR__ . '/../module/Session.php');
require_once(__DIR__ . '/../entity/User.php');
require_once(__DIR__ . '/../dao/UserDAO.php');

// Session
$session = Session::getInstance();

// Db Things
$connection = Connection::getInstance();
$user_dao = new UserDAO($connection);


// Record (DATA ARE ALREADY NAMED IS THE $_POST VARIABLE)
$user = new User($_POST);

if ($user_dao->select(['email' => $user->getEmail()])) {
    $response[ 'status' ] = 'user_already_exists';
} else {
    if ($user_dao->create($user)) {
        //Log-in
        $response[ 'status' ] = 'success';
        $user = $user_dao->logIn($user->getEmail(), $user->getPassword());
        $session->writeSession('user', $user);

        // Register sports
        $sport_ids = $_POST[ 'sports' ];
        foreach ($sport_ids as $sport_id) {
            $user_dao->addUserSport($user, $sport_id);
        }
    } else {
        $response[ 'status' ] = 'error';
    }
}

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);


