<?php
require('templates/layout.php');
require_once('module/Connection.php');

$connection = Connection::getInstance();
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
<?php getMenu(); ?>

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
                    <input type="email" name="email_adress" required/>
                </div>

                <div class="Form-group">
                    <label>MOT DE PASSE</label>
                    <input type="password" name="password" required/>
                </div>

                <button type="submit" class="Connexion-submit">Se connecter</button>

            </div>
        </form>
    </div>
</section>


<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->

</body>
</html>
