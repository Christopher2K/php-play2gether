<?php
require_once(__DIR__.'/../module/Connection.php');
require_once(__DIR__.'/../module/Session.php');
require_once(__DIR__.'/../entity/User.php');
require_once(__DIR__.'/../dao/UserDAO.php');

// Session
$session = Session::getInstance();

// Db Things
$connection = Connection::getInstance();
$user_dao = new UserDAO($connection);

// Declarations
$data = [
    'email'    => $_POST[ 'email' ],
    'password' => $_POST[ 'password' ],
];

// Connexion
$response = [];

if ($user_dao->select(['email' => $data[ 'email' ]])) {
    $user = $user_dao->logIn($data[ 'email' ], $data[ 'password' ]);
    if ($user) {
        $response[ 'status' ] = 'success';
        $session->writeSession('user', $user);
    } else {
        $response[ 'status' ] = 'not_found';
    }
} else {
    $response[ 'status' ] = 'not_found';
}

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


