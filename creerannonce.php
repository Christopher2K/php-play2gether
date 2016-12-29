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
    $title = 'Créer une annonce';
    getHead($title);
    ?>
</head>

<body class="CreateAnnonce">
<?php getMenu($session); ?>

<!-- About Section -->
<section id="createannonce">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading newannonce">Nouvelle Annonce</h2>
                <hr />
                <h3 class="large text-muted">Ajouter une Nouvelle Annonce</h3>
            </div>
        </div>
        <form method="post"  id="createannonce">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dateEvenement">Date Evenement</label>
                    <input type="date" name="dateEvenement" class="form-control" id="prenom" required data-validation-required-message="Veuillez renseigner La date d'evenement" placeholder="Date Evenement">
                </div>
                <div class="form-group">
                    <label for="sport">Sport</label>
                    <select name="sport">
                        <?php foreach ($sports as $sport): ?>
                            <option value=<?=$sport["IDSPORT"] ?> ><?=$sport["NOMSPORT"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control" id="id" aria-describedby="id" placeholder="Identifiant">
                </div>
                <div class="form-group">
                    <label for="nbJoueurs">Nombre De Joueurs Max</label>
                    <input type="number" name="nbJoueurs" class="form-control" id="password" placeholder="Mot de passe">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <select name="ville">
                        <?php foreach ($villes as $ville): ?>
                            <option value=<?=$ville["ville_id"] ?> ><?=$ville["ville_nom"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                 <div class="form-group">
                    <div class="description-annonce">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="prenom" required data-validation-required-message="Veuillez renseigner votre prénom" placeholder="Description de l'annonce"></textarea>
                    </div>
                </div>
                
            </div>
            
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    </div>
</section>

    <?php getFooter(); ?>

    <?php getScripts(); ?>

        </body>
        </html>
