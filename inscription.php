<?php
require('templates/layout.php');
require('module/Session.php');

$session = Session::getInstance();

if ($session->userIsLogged()) {
    header ('Location: profil.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $title = 'Inscription';
    getHead($title);
    ?>
</head>

<body class="RegisterIndex">
<?php getMenu($session); ?>

<section class="Register">
    <div class="Register-header">
        <h1>Inscription</h1>
        <hr/>
        <p>Inscrivez vous pour accéder à la plate-forme</p>
    </div>

    <div class="Register-content">
        <form id="registerForm" class="Form">
            <div class="Field-group">
                <div class="Fields-left">
                    <div class="Form-group">
                        <label>NOM</label>
                        <input type="text" name="last_name" required/>
                    </div>

                    <div class="Form-group">
                        <label>PRENOM</label>
                        <input type="text" name="first_name" required/>
                    </div>

                    <div class="Form-group">
                        <label for="gender">SEXE</label>
                        <select name="gender" required>
                            <option value="0">Homme</option>
                            <option value="1">Femme</option>
                        </select>
                    </div>

                    <div class="Form-group">
                        <label>DATE DE NAISSANCE</label>
                        <input type="date" name="birth_date" required/>
                    </div>

                    <div class="Form-group">
                        <label>TELEPHONE PORTABLE</label>
                        <input maxlength="10" type="tel" name="number" required/>
                    </div>
                </div>

                <div class="Fields-right">
                    <div class="Form-group">
                        <label>ADRESSE E-MAIL</label>
                        <input type="email" name="email_adress" required/>
                    </div>

                    <div class="Form-group">
                        <label>MOT DE PASSE</label>
                        <input type="password" name="password" required/>
                    </div>

                    <div class="Form-group">
                        <label>CONFIRMATION DE MOT DE PASSE</label>
                        <input type="password" name="password_confirm" required/>
                    </div>

                    <div class="Form-group">
                        <label>VILLE</label>
                        <select name="city" required></select>
                    </div>
                </div>
            </div>

            <div class="Fields-center Sport-fields">
                <div class="Sport-groupField sport1">
                    <div class="Sport-select">
                        <label>CHOISI UN SPORT</label>
                        <select name="sport1" required></select>
                    </div>


                    <div class="Sport-add">
                        <i class="addSport fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="deleteSport fa fa-minus-circle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="Fields-center">
                <div class="alert alert-danger mail_error hidden">
                    <strong>Erreur !</strong> L'adresse mail entrée est déjà utilisée.
                </div>

                <div class="alert alert-danger password_error hidden">
                    <strong>Erreur !</strong> Les mots de passe ne sont pas identiques.
                </div>

                <div class="alert alert-danger server_error hidden">
                    <strong>Erreur !</strong> Quelque chose s'est mal passé. Contactez nous.
                </div>
                <button type="submit">S'inscrire !</button>
            </div>
        </form>
    </div>
</section>


<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Lib -->
<!-- Script custom -->
<script src="/statics/script/registration-service.js"></script>


</body>
</html>
