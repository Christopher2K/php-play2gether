<?php
require('templates/layout.php');
require('module/Session.php');

$session = Session::getInstance();
$user = '';

if ($session->userIsLogged()) {
    $user = $session->readSession('user');
} else {
    header ('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $title = 'Profil';
    getHead($title);
    ?>
</head>

<body class="ProfilIndex">
<?php getMenu($session); ?>

<?php getFooter(); ?>

<?php getScripts(); ?>

</body>
</html>

