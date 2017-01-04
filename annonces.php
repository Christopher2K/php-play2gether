<?php
require_once(__DIR__ . '/templates/layout.php');
require_once(__DIR__ . '/module/Session.php');
require_once(__DIR__ . '/module/Connection.php');

require_once(__DIR__ . '/services/SearchAdService.php');

$session = Session::getInstance();

if (!$session->userIsLogged()) {
    header('Location: profil.php');
} else {
    $ads = getSearchResult(Connection::getInstance(), $_POST);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $title = 'Annonces';
    getHead($title);
    ?>
</head>


<body class="AdsIndex">
<?php getMenu($session); ?>
<section class="Ads">
    <div class="Ads-header">
        <h1>Recherche d'annonce</h1>
        <hr/>
        <p>Trouves ta partie !</p>
    </div>

    <div class="Ads-content container">
        <form method="post" action="" id="adsSearchForm" class="Ads-searchForm row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date">DATE DE LA RENCONTRE</label>
                    <input type="date" name="date" class="form-control"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sport_fk">SPORT</label>
                    <select name="sport_fk" class="form-control">
                        <option value="" selected>Choisir un sport</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city_fk">VILLE</label>
                    <select name="city_fk" required></select>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit">Rechercher</button>
            </div>
        </form>

        <div class="Ads-result row">
        <?php
        foreach ($ads as $ad) {
            ?>
                <div class="Ad-wrapper col-md-4 clearfix visible-md visible-lg">
                    <div class="Ad">
                        <h3><?php echo $ad['title'] ?></h3>
                        <h4><?php echo $ad['sport'] ?></h4>
                        <p><?php echo $ad['date'] ?></p>
                        <p><?php echo $ad['current_players'] ?> participants sur <?php echo $ad['max_players'] ?></p>
                        <button><a href="/annonceDetail.php/?id=<?php echo $ad['id'] ?>">VOIR</a></button>
                    </div>
                </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>

<!-- Annonce Section -->
<!--<section id="annonce" class="bg-light-gray">-->
<!--   <div class="container">-->
<!--   <div class="row">-->
<!--      <div class="col-lg-12 text-center">-->
<!--         <h2 class="section-heading annonce-title">Recherche</h2>-->
<!--         <hr />-->
<!--         <h3 class="section-subheading text-muted">Trouves ta partie ! </h3>-->
<!--      </div>-->
<!--   </div>-->
<!--   <div class="row">-->
<!--   <div class="col-lg-12">-->
<!--      <form name="search-game" id="searchgame" novalidate>-->
<!--         <div class="row">-->
<!--            <div class="col-sm-3">-->
<!--               <div class="form-group">-->
<!--                  <label>Date</label>-->
<!--                  <input type="date" class="form-control" id="date" placeholder="jj/mm/aaaa"required>-->
<!--                  <p class="help-block text-danger"></p>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--               <div class="form-group">-->
<!--                    <label for="sport">Sport</label>-->
<!--                    <select name="sport">-->
<!--                        --><?php //foreach ($sports as $sport): ?>
<!--                            <option value=--><? //=$sport["IDSPORT"] ?><!-- >-->
<? //=$sport["NOMSPORT"]?><!--</option>-->
<!--                        --><?php //endforeach;?>
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--               <div class="form-group">-->
<!--                    <label for="ville">Ville</label>-->
<!--                    <select name="ville">-->
<!--                        --><?php //foreach ($villes as $ville): ?>
<!--                            <option value=--><? //=$ville["ville_id"] ?><!-- >-->
<? //=$ville["ville_nom"]?><!--</option>-->
<!--                        --><?php //endforeach;?>
<!--                    </select>-->
<!--                </div>-->
<!--        </div>-->
<!--            <div class="col-sm-3">-->
<!--               <div class="form-group">-->
<!--                  <label for="ville">Nb de joueurs</label>-->
<!--                  <select>-->
<!--                     <option value="1">1</option>-->
<!--                     <option value="2">2</option>-->
<!--                     <option value="3">3</option>-->
<!--                     <option value="4">4</option>-->
<!--                     <option value="5">5</option>-->
<!--                     <option value="6">6</option>-->
<!--                     <option value="7">7</option>-->
<!--                     <option value="4">8</option>-->
<!--                     <option value="9">9</option>-->
<!--                     <option value="10">10</option>-->
<!--                  </select>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
<!--            <div class="col-lg-12 text-center">-->
<!--               <div id="success"></div>-->
<!--               <button type="submit" class="btn btn-xl">Rechercher</button>-->
<!--            </div>-->
<!--      </form>-->
<!--      </div>-->
<!--   </div>-->
<!--   </section>-->


<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->
<script src="statics/script/search-service.js"></script>

</body>
</html>