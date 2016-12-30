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
    $title = 'Annonces Détail';
    getHead($title);
    ?>
</head>

<body class="DetailAnnonce">
<?php getMenu($session); ?>
<!-- Annonce Section -->

<section id="annonceSport" class="bg-light-gray">

	<div class="col-md-12 text-center">
         <h2 class="section-heading detailannonce-title">Titre de l'annonce</h2>
         <hr />
         <h3 class="section-subheading text-muted">Rencontre le : 01/01/2017</h3>
    </div>
	<div class="container">
            <div class="row">
                <div class="col-md-12">
						<div class="single-para ">
						<h4>Lieu : Amiens</h4>
						
						<br />
							<h5 class="auteur">Nombre de joueurs : </h5>
								<p>1/12</p>
							<h5 class="auteur"><strong>Description :</strong></h5><p>"Alors on va faire un foot, manger des Pitchs et pourquoi
								pas s'mettre quelques patates dans la gueule comme des beaufs."</p>
							

							<h5 class="auteur">Posté par : </h5> <p>Un golmon</p>
							
							<br />
							<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Valider</button>
							<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer</button>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->
<script src="statics/script/login-service.js"></script>

</body>
</html>