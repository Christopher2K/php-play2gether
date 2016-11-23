<!DOCTYPE html>

    <?php 
        include 'includes/header.php'; 
    ?>

<!-- About Section -->
    <section id="inscription">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Inscription</h2>
                    <hr />
                    <h3 class="large text-muted">Inscrivez-vous pour accéder à la plate-forme</h3>
                </div>
            </div>
                <form method="post" action="resultat.php" id="inscription">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" required data-validation-required-message="Veuillez renseigner votre Nom" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" required data-validation-required-message="Veuillez renseigner votre prénom" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <label for="id">Identifiant</label>
                            <input type="text" class="form-control" id="id" aria-describedby="id" placeholder="Identifiant">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="verifpassword">Saisir à nouveau le mot de passe</label>
                            <input type="password" class="form-control" id="verifpassword" placeholder="Mot de passe">
                        </div>
                    </div>
                     
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sexe"> Sexe </label></br> 
                           <div class="sexe"> 
                                Homme <input name="sexe" type="radio" value="homme">
                                Femme <input name="sexe" type="radio" value="femme">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="naissance">
                            <label for="born">Date de naissance</label>
                            <input type="date" class="form-control" id="born" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" placeholder="Ville">
                        </div>
                        <div class="form-group">
                            <label for="ville">Sport</label>
                            <select>
                                <option value="volvo">Football</option>
                                <option value="saab">Tennis</option>
                                <option value="mercedes">Badminton</option>
                                <option value="audi">Hockey</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Inscription</button>
                </form>
            </div>
        </div>
    </section>

    <?php 
        include 'includes/footer.php'; 
    ?>
