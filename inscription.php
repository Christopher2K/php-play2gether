<?php
require('templates/layout.php');

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
<?php getMenu(); ?>

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
                        <label>SEXE</label>
                        <select name="gender" required>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                    </div>

                    <div class="Form-group">
                        <label>DATE DE NAISSANCE</label>
                        <input type="date" name="birth_date" required/>
                    </div>

                    <div class="Form-group">
                        <label>VILLE</label>
                        <select name="city"></select>
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
                        <label>SPORT PREFERÉ</label>
                        <select></select>
                    </div>
                </div>
            </div>

            <div class="Fields-center">
                <button type="submit">S'inscrire !</button>
            </div>
        </form>
    </div>
</section>


<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->

</body>
</html>
