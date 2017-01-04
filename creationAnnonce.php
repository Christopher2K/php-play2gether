<?php
require('templates/layout.php');
require('module/Session.php');

$session = Session::getInstance();

if (!$session->userIsLogged()) {
    header('Location: profil.php');
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

<body class="CreateAdIndex">
<?php getMenu($session); ?>

<!-- About Section -->
<section class="CreateAd" id="createannonce">

    <div class="CreateAd-header">
        <h1>Nouvelle Annonce</h1>
        <hr/>
        <p>Organise ta propre session sportive !s</p>
    </div>

    <div class="CreateAd-content container">
        <form method="post" id="createAdForm" class="CreateAd-form">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">TITRE</label>
                    <input type="text" name="title" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="sport">SPORT</label>
                    <select name="sport" required></select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date">DATE DE LA SESSION</label>
                    <input type="date" name="date" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="max_players">JOUEURS MAX</label>
                    <select name="max_players" required>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
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
                    <textarea name="content" class="form-control textarea" required
                              placeholder="L'heure, les règles, les activités prévues... (50 caractères min)"></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="alert alert-danger server_error hidden">
                    <strong>Erreur !</strong> Quelque chose s'est mal passé. Contactez nous.
                </div>

                <div class="alert alert-danger date_error hidden">
                    <strong>Erreur !</strong> La date de ta session sportive ne peut pas être antérieure à la date d'aujourd'hui !
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit">Créer ton annonce !</button>
            </div>
        </form>
    </div>
</section>

<?php getFooter(); ?>

<?php getScripts(); ?>
<script src="statics/script/create-ad-service.js"></script>

</body>
</html>
