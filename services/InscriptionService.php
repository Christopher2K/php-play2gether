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

// Declarations

$data = [
    'id_ville'       => $_POST['city'],
    'email'          => $_POST['email'],
    'password'       => $_POST['password'],
    'nom'            => $_POST['last_name'],
    'prenom'         => $_POST['first_name'],
    'sexe'           => $_POST['gender'],
    'date_naissance' => $_POST['birth_date'],
];

// Record
$user = new User($data);
$response = [];

if ($user_dao->insertUser($user)) {
    $response['status'] = 'success';

    //Log-in
    $session->writeSession('user', $user);
} else {
    $response['status'] = 'error';
}


// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);


