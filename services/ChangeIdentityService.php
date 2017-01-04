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
    'last_name'  => $_POST[ 'last_name' ],
    'first_name' => $_POST[ 'first_name' ],
    'city_fk'    => $_POST[ 'city' ],
    'number'     => $_POST[ 'number' ]
];

$response = [];

if ($user_dao->updateIdentity($user, $data[ 'first_name' ], $data[ 'last_name' ], $data[ 'city_fk' ], $data[ 'number' ])) {
    $session->writeSession('user', $user_dao->select(['id_user' => $user->getIdUser()])[ 0 ]);
    $response[ 'status' ] = 'success';
} else {
    $response[ 'status' ] = 'error';
}

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);