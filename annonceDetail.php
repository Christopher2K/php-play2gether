<?php
require_once(__DIR__ . '/templates/layout.php');

require_once(__DIR__ . '/module/Session.php');
require_once(__DIR__ . '/module/Connection.php');

require_once(__DIR__ . '/dao/AdDAO.php');
require_once(__DIR__ . '/entity/Ad.php');

require_once(__DIR__ . '/dao/CityDAO.php');
require_once(__DIR__ . '/entity/City.php');

require_once(__DIR__ . '/dao/UserDAO.php');
require_once(__DIR__ . '/entity/User.php');

require_once(__DIR__ . '/dao/StatusDAO.php');
require_once(__DIR__ . '/entity/Status.php');

require_once(__DIR__ . '/dao/SportDAO.php');
require_once(__DIR__ . '/entity/Sport.php');

$session = Session::getInstance();
$ad_dao = new AdDAO(Connection::getInstance());
$city_dao = new CityDAO(Connection::getInstance());
$user_dao = new UserDAO(Connection::getInstance());
$sport_dao = new SportDAO(Connection::getInstance());
$status_dao = new StatusDAO(Connection::getInstance());

if (!$session->userIsLogged()) {
    header('Location: profil.php');
} else {
    $user = $session->readSession('user');
}

$ad = '';
$ad_creator = '';
$ad_stauts = '';
$ad_city = '';
$ad_sport = '';
$users_ad = '';

if (isset($_GET[ 'id' ])) {
    $ad = $ad_dao->select(['id_ad' => $_GET[ 'id' ]])[ 0 ];
    $ad_city = $city_dao->select(['id_city' => $ad->getCityFk()])[ 0 ];
    $ad_status = $status_dao->select(['id_status' => $ad->getStatusFk()])[ 0 ];
    $ad_creator = $user_dao->select(['id_user' => $ad->getCreatorFk()])[ 0 ];
    $ad_sport = $sport_dao->select(['id_sport' => $ad->getSportFk()])[ 0 ];

    $users_ad = $user_dao->getUsersByAd($_GET[ 'id' ]);
} else {
    header('Location: /annonces.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $title = 'Détail de l\'annonce : ' . $ad->getTitle();
    getHead($title);
    ?>
</head>

<body class="ShowAdIndex">
<?php getMenu($session); ?>

<!-- Annonce Section -->
<section id="annonceSport" class="ShowAd">

    <div class="ShowAd-header">
        <h1><?php echo $ad->getTitle() ?></h1>
        <hr/>
        <p>Rencontre prévue le : <?php echo $ad->getDate() ?></>
    </div>

    <div class="ShowAd-content container">
        <div class="row">
            <div class="col-md-12">

                <div class="Details text-center">
                    <h2><?php echo $ad_sport->getName() ?></h2>
                    <h4>Cette annonce est : <strong><?php echo $ad_status->getName() ?></strong></h4>
                    <div class="Info">
                        <h5 class="Info-title">Lieu :</h5>
                        <p class="Info-content"><?php echo $ad_city->getName(); ?></p>
                    </div>

                    <div class="Info">
                        <h5 class="Info-title">Nombre de joueurs :</h5>
                        <p class="Info-content"><?php echo count($users_ad) ?> / <?php echo $ad->getMaxPlayers() ?></p>
                    </div>

                    <div class="Info">
                        <h5 class="Info-title">Description :</h5>
                        <p class="Info-content"><?php echo $ad->getContent() ?></p>
                    </div>

                    <div class="Info">
                        <h5 class="Info-title">Créateur de l'annonce :</h5>
                        <p class="Info-content"><?php echo $ad_creator ?></p>
                    </div>

                    <div class="Actions">
                        <?php
                        // If $user = $creator
                        if ($ad->isCreator($user)) {
                            ?>
                            <button class="Action-modify">Modifier mon annonce</button>
                            <button class="Action-delete">Supprimer mon annonce</button>
                            <?php
                        } else {
                            if ($ad->hasSubscribe($user, $users_ad)) {
                                ?>
                                <button class="Action-unsubscribe">Se désister</button>
                                <?php
                            } else {
                                ?>
                                <button class="Action-subscribe">Participer à cette annonce</button>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>

                <?php
                if ($ad->isCreator($user)) {
                    ?>
                    <div class="ModifyAd hidden">
                        <h3>Modification de l'annonce</h3>
                        <form method="post" id="modifyAdForm" class="ModifyAd-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">TITRE</label>
                                    <input type="text" name="title" class="form-control" required
                                           value="<?php echo $ad->getTitle(); ?>"/>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">DATE DE LA SESSION</label>
                                    <input type="date" name="date" value="<?php echo $ad->getDate(FALSE) ?>"
                                           class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city">LIEU</label>
                                    <select name="city" required></select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">DESCRIPTION DE TON ANNONCE</label>
                                    <textarea name="content" class="form-control textarea"
                                              required><?php echo $ad->getContent(); ?></textarea>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="alert alert-danger server_error hidden">
                                    <strong>Erreur !</strong> Quelque chose s'est mal passé. Contactez nous.
                                </div>

                                <div class="alert alert-danger date_error hidden">
                                    <strong>Erreur !</strong> La date de ta session sportive ne peut pas être
                                    antérieure à
                                    la date d'aujourd'hui !
                                </div>
                            </div>

                            <div class="col-md-12 Form-actions">
                                <button type="submit">Enregistrer les modifications</button>
                                <button class="GoBack">Annuler</button>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>

<?php getFooter(); ?>

<?php getScripts(); ?>
<script>var urlParams = <?php echo json_encode($_GET, JSON_HEX_TAG);?>;</script>
<script src="/statics/script/subscription-ad-service.js"></script>
<script src="/statics/script/modify-ad-service.js"></script>
<script src="/statics/script/delete-ad-service.js"></script>
</body>
</html>