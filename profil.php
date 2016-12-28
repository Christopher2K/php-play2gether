<?php
require('templates/layout.php');
require('module/Connection.php');
require('module/Session.php');

require('dao/CityDAO.php');
require('entity/City.php');

require('entity/User.php');

$connexion = Connection::getInstance();
$session = Session::getInstance();
$city_dao = new CityDAO($connexion);

$user = '';
$user_city = '';

if ($session->userIsLogged()) {
    $user = $session->readSession('user');
    $user_city = $city_dao->select(['id_city' => $user->getCityFk()])[0];
} else {
    header('Location: connexion.php');
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

<body class="ProfileIndex">
<?php getMenu($session); ?>

<section class="ProfileView">
    <div class="ProfileView-header">
        <h1>TON PROFIL</h1>
        <hr/>
        <p>Ici tu peux consulter et modifier tes informations</p>
    </div>

    <div class="ProfileView-content">
        <div class="Identity">
            <div class="Identity-image">
                <img src="/statics/img/avatar.png" alt="Image de profil"/>
            </div>
            <div class="Identity-infos">
                <h1>Hello !</h1>
                <h2><?php echo $user->getFirstName(); ?><?php echo strtoupper($user->getLastName()); ?></h2>
                <p>Tu es actif dans la ville de <strong><?php echo $user_city->getName(); ?></strong>. </p>
            </div>
        </div>

        <div class="Credentials-form">
            <h3>Modifier tes informations d'identification</h3>
            <form>
                <div>
                    <div class="Form-group">
                        <label>Adresse mail</label>
                        <input/>
                    </div>

                    <div class="Form-group">
                        <label>Mot de passe actuel</label>
                        <input/>
                    </div>
                </div>

                <div>
                    <div class="Form-group">
                        <label>Nouveau mot de passe</label>
                        <input/>
                    </div>

                    <div class="Form-group">
                        <label>Confirmation Mot de passe</label>
                        <input/>
                    </div>
                </div>

                <div>
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>

        <div class="Identity-form">
            <h3>Modifier tes informations de profil</h3>
            <form>
                <div>
                    <div class="Form-group">
                        <label>Nom</label>
                        <input/>
                    </div>

                    <div class="Form-group">
                        <label>Prénom</label>
                        <input/>
                    </div>
                </div>

                <div>
                    <div class="Form-group">
                        <label>Ville</label>
                        <input/>
                    </div>
                </div>

                <div>
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>

        <div class="Form-button">
            <button id="History">Consulter mon historique</button>
            <button id="CredentialsForm">Modifier mes informations d'identification</button>
            <button id="IdentityForm">Modifier mes informations de profil</button>
            <button id="HideForm" class="hidden">Retour</button>
        </div>
    </div>

</section>

<?php getFooter(); ?>

<?php getScripts(); ?>

</body>
</html>

