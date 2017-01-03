<?php
require('templates/layout.php');
require('module/Connection.php');
require('module/Session.php');

require('entity/City.php');
require('dao/CityDAO.php');

require('entity/Sport.php');
require('dao/SportDAO.php');

require('entity/User.php');
require('dao/UserDAO.php');

require('entity/Ad.php');
require('dao/AdDAO.php');

$connexion = Connection::getInstance();
$session = Session::getInstance();

$ad_dao = new AdDAO($connexion);
$city_dao = new CityDAO($connexion);
$sport_dao = new SportDAO($connexion);
$user_dao = new UserDAO($connexion);

$user = '';
$user_city = '';
$user_sports = '';
$user_ads = '';
$other_ads = '';

if ($session->userIsLogged()) {
    $user = $session->readSession('user');
    $user_city = $city_dao->select(['id_city' => $user->getCityFk()])[ 0 ];
    $user_sports = $sport_dao->getSportsByUser($user);
    $user_ads = $ad_dao->getAdByUser($user);
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
                <h2><?php echo ucfirst(strtolower($user->getLastName())); ?><?php echo strtoupper($user->getFirstName()); ?></h2>
                <p>Tu es actif dans la ville de <strong><?php echo $user_city->getName(); ?></strong>. </p>
                <p>Tu pratiques les sports suivants:
                    <?php
                    foreach ($user_sports as $user_sport) {
                        echo '<strong>' . $user_sport->getName() . '</strong> ';
                    } ?>
                </p>
                <p>Tes informations de contact:</p>
                <p><strong><?php echo $user->getEmail(); ?></strong></p>
                <p><strong><?php echo $user->getNumber(); ?></strong></p>
            </div>
        </div>

        <div class="History-ads container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Historique des sessions sportives</h3>
                </div>
            </div>

            <?php
            foreach ($user_ads as $ad) {
                ?>
                <div class="row">
                    <div class="Ad col-md-offset-2 col-md-8 col-xs-12">
                        <div class="Ad-title col-md-3">
                            <p><?php echo $ad->getTitle(); ?></p>
                        </div>
                        <div class="Ad-author col-md-2">
                            <p><?php echo $user_dao->select(['id_user' => $ad->getCreatorFk()])[0]; ?></p>
                        </div>
                        <div class="Ad-date col-md-2">
                            <p><?php echo $ad->getDate(); ?></p>
                        </div>
                        <div class="Ad-sport col-md-2">
                            <p><?php echo $sport_dao->select(['id_sport' => $ad->getSportFk()])[0]->getName(); ?></p>
                        </div>
                        <div class="Ad-button col-md-3">
                            <button><a href="/annonceDetail.php?id=<?php echo $ad->getIdAd(); ?>">Voir</a></button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="Credentials-form hidden">
            <h3>Modifier tes informations d'identification</h3>
            <hr/>
            <form id="credentialsForm">
                <div class="Form-line">
                    <div class="Form-group">
                        <label for="email">ADRESSE MAIL</label>
                        <input type="email" name="email" value="<?php echo $user->getEmail(); ?>" required/>
                    </div>

                    <div class="Form-group">
                        <label for="current_password">MOT DE PASSE ACTUEL</label>
                        <input type="password" name="current_password" required/>
                    </div>
                </div>

                <div class="Form-line">
                    <div class="Form-group">
                        <label for="new_password">NOUVEAU MOT DE PASSE</label>
                        <input type="password" name="new_password" required/>
                    </div>

                    <div class="Form-group">
                        <label for="new_password_confirm">CONFIRMATION</label>
                        <input type="password" name="new_password_confirm" required/>
                    </div>
                </div>

                <div class="Form-center">
                    <div class="alert alert-danger incorrect_password hidden">
                        <strong>Erreur !</strong> Mot de passe actuel incorrect !.
                    </div>

                    <div class="alert alert-danger not_the_same hidden">
                        <strong>Erreur !</strong> Les mots de passe ne correspondent pas.
                    </div>

                    <div class="alert alert-danger server_error hidden">
                        <strong>Erreur !</strong> Quelque chose s'est mal passé. Contactez nous.
                    </div>

                    <button type="submit">ENREGISTRER</button>
                </div>
            </form>
        </div>

        <div class="Identity-form hidden">
            <h3>Modifier tes informations de profil</h3>
            <hr/>
            <form>
                <div class="Form-line">
                    <div class="Form-group">
                        <label for="last_name">NOM</label>
                        <input type="text" name="last_name" value="<?php echo $user->getLastName(); ?>" required/>
                    </div>

                    <div class="Form-group">
                        <label for="first_name">PRENOM</label>
                        <input type="text" name="first_name" value="<?php echo $user->getFirstName(); ?>" required/>
                    </div>
                </div>

                <div class="Form-line">
                    <div class="Form-group">
                        <label for="number">TÉLÉPHONE PORTABLE</label>
                        <input maxlength="10" type="tel" name="number" value="" required/>
                    </div>
                    <div class="Form-group">
                        <label for="city">VILLE</label>
                        <select name="city" required></select>
                    </div>
                </div>

                <div class="Form-center">
                    <div class="alert alert-danger server_error hidden">
                        <strong>Erreur !</strong> Quelque chose s'est mal passé. Contactez nous.
                    </div>

                    <button type="submit">ENREGISTRER</button>
                </div>
            </form>
        </div>

        <div class="Profile-button">
            <button id="CredentialsForm" class="FormButton">Modifier mes informations d'identification</button>
            <button id="IdentityForm" class="FormButton">Modifier mes informations de profil</button>
            <button id="HideForm" class="hidden">Retour</button>
        </div>
    </div>

</section>

<?php getFooter(); ?>

<?php getScripts(); ?>
<script src="statics/script/profile-service.js"></script>

</body>
</html>

