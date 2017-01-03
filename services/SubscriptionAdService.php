<?php
require_once(__DIR__ . '/../module/Session.php');
require_once(__DIR__ . '/../module/Connection.php');


require_once(__DIR__ . '/../dao/AdDAO.php');
require_once(__DIR__ . '/../entity/Ad.php');

require_once(__DIR__ . '/../dao/UserDAO.php');
require_once(__DIR__ . '/../entity/User.php');

$session = Session::getInstance();
$connexion = Connection::getInstance();

$user = $session->readSession('user');

$ad_dao = new AdDAO($connexion);
$user_dao = new UserDAO($connexion);

$ad = $ad_dao->select(['id_ad' => $_POST[ 'id_ad' ]])[ 0 ];
$users_ad = $user_dao->getUsersByAd($_POST[ 'id_ad' ]);

if ($user & $ad->getStatusFk() != Ad::$STATUS_TERMINATED) {
    switch ($_POST[ 'action' ]) {
        case 'subscribe':

            if ($ad->hasSubscribe($user, $users_ad)) {
                $response[ 'status' ] = 'already_subscribed';
            } else {
                if ($ad->isFull($users_ad)) {
                    $response[ 'status' ] = 'ad_already_full';
                } else {
                    if ($user_dao->addUserAd($user, $_POST[ 'id_ad' ])) {
                        $users_ad = $user_dao->getUsersByAd($_POST[ 'id_ad' ]);

                        if ($ad->isFull($users_ad)) {
                            $ad_dao->changeStatus($_POST[ 'id_ad' ], Ad::$STATUS_FULL);
                        }

                        $response[ 'status' ] = 'success';
                        $response [ 'id_ad' ] = $_POST[ 'id_ad' ];
                    } else {
                        $response[ 'status' ] = 'error';
                    }
                }

            }

            break;

        case 'unsubscribe':

            if (!$ad->hasSubscribe($user, $users_ad)) {
                $response[ 'status' ] = 'not_subscribed';
            } else {
                if ($user_dao->deleteUserAd($user, $_POST[ 'id_ad' ])) {
                    $users_ad = $user_dao->getUsersByAd($_POST[ 'id_ad' ]);

                    if ($ad->isFull($users_ad)) {
                        $ad_dao->changeStatus($_POST[ 'id_ad' ], Ad::$STATUS_IN_PROGRESS);
                    }

                    $response[ 'status' ] = 'success';
                    $response [ 'id_ad' ] = $_POST[ 'id_ad' ];
                } else {
                    $response[ 'status' ] = 'error';
                }
            }

            break;
        default:
            $response[ 'status' ] = 'error';
            break;
    }
} else {
    $response[ 'status' ] = 'user_not_logged';
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);
