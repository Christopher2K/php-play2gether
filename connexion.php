<!DOCTYPE html>

    <?php 
        include 'includes/header.php'; 
    ?>
        <!-- About Section -->
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Espace de connexion</h2>
                    <hr />
                    <h3 class="large text-muted">Veuillez vous identifier</h3>
                </div>
            </div>
                <form>
                    <div class="form-group">
                        <label for="id">Identifiant</label>
                        <input type="text" class="form-control" id="id" aria-describedby="id" placeholder="Identifiant">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>
    </section>
    
    <?php 
        include 'includes/footer.php'; 
    ?>
