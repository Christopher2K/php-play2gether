<?php
require_once(__DIR__ . '/../module/Session.php');
require_once(__DIR__ . '/../module/Connection.php');

require_once(__DIR__ . '/../dao/CommentDAO.php');
require_once(__DIR__ . '/../entity/Comment.php');

require_once(__DIR__ . '/../entity/User.php');

$session = Session::getInstance();
$connexion = Connection::getInstance();
$user = $session->readSession('user');

$comment_dao = new CommentDAO($connexion);

if ($user) {
    $comment = new Comment($_POST);
    $comment->setAuthorFk($user->getIdUser());

    if ($comment_dao->create($comment)) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
        $response['error'] = 'not_created';
    }

} else {
    $response['status'] = 'user_not_logged';
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHED);



