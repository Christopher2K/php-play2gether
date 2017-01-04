<?php
require_once(__DIR__ . '/../module/Connection.php');
require_once(__DIR__ . '/../module/Session.php');
require_once(__DIR__ . '/../entity/User.php');
require_once(__DIR__ . '/../dao/UserDAO.php');

require_once(__DIR__ . '/../module/Communication.php');

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
<<<<<<< HEAD
       // Communication::sendMail($user->getEmail(),'Votre compte a ete enregistre','Bienvenue sur Sport2Gether ! Déposez dès maintenant une annonce ou recherchez en une ! A bientot sur www.play2Gether.tk');
=======


>>>>>>> b6a550d3d422845d6b3af538f97adf1b167cbf05
        // Register sports
        $sport_ids = $_POST[ 'sports' ];
        foreach ($sport_ids as $sport_id) {
            $user_dao->addUserSport($user, $sport_id);
        }

//        try {
//            Communication::sendMail($_POST['email'],'Votre compte a ete enregistre','Bienvenue sur Sport2Gether ! Déposez dès maintenant une annonce ou recherchez en une ! A bientot sur www.play2Gether.tk');
//        } catch (Exception $e) {
//            // DO NOTHING
//        }

    } else {
        $response[ 'status' ] = 'error';
        $response[ 'error' ] = 'not_created';
    }
}

// Return
header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);


