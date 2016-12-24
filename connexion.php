<?php
require_once('templates/layout.php');
require_once('module/Session.php');
require_once('module/Connection.php');

$session = Session::getInstance();

if ($session->userIsLogged()) {
    header ('Location: profil.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $title = 'Connexion';
    getHead($title);
    ?>
</head>

<body class="LoginIndex">
<?php getMenu($session); ?>

<section class="Login">
    <div class="Login-header">
        <h1>Connexion</h1>
        <hr/>
        <p>Connectez-vous pour accéder aux dernières parties !</p>
    </div>

    <div class="Login-content">
        <form id="connexionForm" class="Form">
            <div class="Fields-center">

                <div class="Form-group">
                    <label>ADRESSE E-MAIL</label>
                    <input type="email" name="email" required/>
                </div>

                <div class="Form-group">
                    <label>MOT DE PASSE</label>
                    <input type="password" name="password" required/>
                </div>

                <div class="alert alert-danger not_found hidden">
                    <strong>Erreur !</strong> Adresse mail ou mot de passe incorrect.
                </div>

                <div class="alert alert-danger server_error hidden">
                    <strong>Erreur !</strong> Quelque chose s'est mal passé. Contactez nous.
                </div>

                <button type="submit" class="Connexion-submit">Se connecter</button>

            </div>
        </form>
    </div>
</section>


<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->
<script src="statics/script/login-service.js"></script>

</body>
</html>
