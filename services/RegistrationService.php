<?php
require_once('../module/Connection.php');
require_once('../module/Session.php');
require_once('../entity/User.php');

require_once('../dao/UserDAO.php');

// Session
$session = Session::getInstance();

// Db Things
$connection = Connection::getInstance();
$user_dao = new UserDAO($connection);


// Record (DATA ARE ALREADY NAMED IS THE $_POST VARIABLE)
$user = new User($_POST);
$response = [];

if ($user_dao->select(['email' => $user->getEmail()])) {
    $response['status'] = 'user_already_exists';
} else {
    if ($user_dao->create($user)) {
        //Log-in
        $response['status'] = 'success';
        $session->writeSession('user', $user_dao->logIn($user->getEmail(), $user->getPassword()));
    } else {
        $response['status'] = 'error';
    }
}

var_dump($session->readSession('user'));

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);


