<?php
require_once(__DIR__.'/templates/layout.php');
require_once(__DIR__.'/module/Session.php');

$session = Session::getInstance();

if (!$session->userIsLogged()) {
    header ('Location: profil.php');
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

<body class="Annonces">
<?php getMenu($session); ?>

<!-- Annonce Section -->
<section id="annonce" class="bg-light-gray">
   <div class="container">
   <div class="row">
      <div class="col-lg-12 text-center">
         <h2 class="section-heading annonce-title">Recherche</h2>
         <hr />
         <h3 class="section-subheading text-muted">Trouves ta partie ! </h3>
      </div>
   </div>
   <div class="row">
   <div class="col-lg-12">
      <form name="search-game" id="searchgame" novalidate>
         <div class="row">
            <div class="col-sm-3">
               <div class="form-group">
                  <label>Date</label>
                  <input type="date" class="form-control" id="date" placeholder="jj/mm/aaaa"required>
                  <p class="help-block text-danger"></p>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group">
                    <label for="sport">Sport</label>
                    <select name="sport">
                        <?php foreach ($sports as $sport): ?>
                            <option value=<?=$sport["IDSPORT"] ?> ><?=$sport["NOMSPORT"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
               <div class="form-group">
                    <label for="ville">Ville</label>
                    <select name="ville">
                        <?php foreach ($villes as $ville): ?>
                            <option value=<?=$ville["ville_id"] ?> ><?=$ville["ville_nom"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
        </div>
            <div class="col-sm-3">
               <div class="form-group">
                  <label for="ville">Nb de joueurs</label>
                  <select>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="4">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                  </select>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
               <div id="success"></div>
               <button type="submit" class="btn btn-xl">Rechercher</button>
            </div>
      </form>
      </div>
   </div>
   </section>

<div class="col-lg-12 text-center">
   <h2 class="section-heading">Les rencontres</h2>
   <hr />
   <h3 class="section-subheading text-muted">Retrouves toutes les annonces selon chaque sport</h3>
</div>
<div class="col-md-12 lessports">
<div class="col-md-2">
    <div class="sport">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-xl">Football </button></a>
    </div>
</div>
<div class="col-md-2">
    <div class="sport">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-xl">Tennis </button></a>
    </div>
</div>
<div class="col-md-2">
    <div class="sport">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-xl">Football US </button></a>
    </div>
</div>
<div class="col-md-2">
    <div class="sport">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-xl">Running</button></a>
    </div>
</div>
<div class="col-md-2">
    <div class="sport">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-xl">Badminton</button></a>
    </div>
</div>
<div class="col-md-2">
    <div class="sport">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-xl">Pétanque</button></a>
    </div>
</div>
</div>
<table class="table-fill">
   <thead>
      <tr>
         <th class="text-left">Titre</th>
         <th class="text-left">Date</th>
         <th class="text-left">Lieu</th>
         <th class="text-left">Participants</th>
      </tr>
   </thead>
   <tbody class="table-hover">
      <tr>
         <td class="text-left">January</td>
         <td class="text-left">$ 50,000.00</td>
         <td class="text-left">January</td>
         <td class="text-left">$ 50,000.00</td>
      </tr>
      <tr>
         <td class="text-left">February</td>
         <td class="text-left">$ 10,000.00</td>
         <td class="text-left">January</td>
         <td class="text-left">$ 50,000.00</td>
      </tr>
      <tr>
         <td class="text-left">March</td>
         <td class="text-left">$ 85,000.00</td>
         <td class="text-left">January</td>
         <td class="text-left">$ 50,000.00</td>
      </tr>
      <tr>
         <td class="text-left">April</td>
         <td class="text-left">$ 56,000.00</td>
         <td class="text-left">January</td>
         <td class="text-left">$ 50,000.00</td>
      </tr>
      <tr>
         <td class="text-left">May</td>
         <td class="text-left">$ 98,000.00</td>
         <td class="text-left">January</td>
         <td class="text-left">$ 50,000.00</td>
      </tr>
   </tbody>

</table>
</div>
</div>

<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->
<script src="statics/script/login-service.js"></script>

</body>
</html>