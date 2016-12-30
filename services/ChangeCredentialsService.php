<?php
require_once(__DIR__ . '/../module/Connection.php');
require_once(__DIR__ . '/../module/Session.php');
require_once(__DIR__ . '/../entity/User.php');
require_once(__DIR__ . '/../dao/UserDAO.php');

// Session
$session = Session::getInstance();

// Db Things
$connection = Connection::getInstance();
$user = $session->readSession('user');

$user_dao = new UserDAO($connection);

// Data
$data = [
    'email'            => $_POST[ 'email' ],
    'current_password' => $_POST[ 'current_password' ],
    'new_password'     => $_POST[ 'new_password' ]
];

$response = [];

// Password verification
$login_user = $user_dao->logIn($user->getEmail(), $data[ 'current_password' ]);

if ($login_user) {
    $user_dao->updateCredentials($user, $data[ 'email' ], User::hashPassword($data[ 'new_password' ]));
    $session->writeSession('user', $user_dao->logIn($data[ 'email' ], $data[ 'new_password' ]));
    $response[ 'status' ] = 'success';
} else {
    $response[ 'status' ] = 'incorrect_password';
}

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);

