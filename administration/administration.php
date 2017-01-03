<!DOCTYPE html>
<?php 
   //include 'includes/header_admin.php'; 
      include 'includes/header_admin.php'; 
      include 'bdd.php';
   
  
  
   ?>
     
<section id="fond" class="bg-light-gray">



    <div id="page">
       
     <div class="col-lg-12 text-center">

	 
   <h2 class="section-heading">Panneau administrateur</h2>
   <hr />
 
</div>

         
        <div style="height:30px"></div>
         
        <!-- debut des articles -->
        <div id="articles">
         
            <div class="article">
                <img src="img/statistique.jpg" width="100%" />
                <h2>Statistiques</h2>
                <p>Obtenez des statistiques sur le site ici : Nombre d'annonces, d'utilisateurs et même le sport le plus pratiqué avec son nombre d'annonces.</p>
                <a class="" href="statistiques.php">Accédez aux statistiques</a>
            </div><!-- .article -->
             
            <div class="article">
                <img src="img/user.png" width="100%" />
                <h2>User Manager</h2>
                <p> Obtenez ici la liste des utilisateurs. Vous pouvez aussi modifier, supprimer ou ajouter un utilisateur/administrateur.</br></br></p>
                <a class="" href="user_manager.php">Accédez à la liste des utilisateurs</a>
            </div><!-- .article -->
             
            <div class="article">
                <img src="img/annonce.png" width="100%" />
                <h2>Annonces</h2>
                <p>Obtenez ici la liste des annonces.
				Vous pouvez aussi lancer une campagne de Mails pour promouvoir des annonces dans une région ou dans un sport.</p><br>
                <a class="" href="annonce_manager.php">Accédez à la liste des annonces</a>
            </div><!-- .article -->
             

            <div class="article">
                <img src="img/sports.jpg" width="100%" />
                <h2>Gérer les sports</h2>
                <p>Obtenez ici la liste des sports. Vous pouvez aussi modifier, supprimer ou ajouter un sport.</p>
                <a class="" href="sport_manager.php">Accédez à liste des sports</a>
            </div><!-- .article -->

			 <div class="article">
                <img src="img/information.jpg" width="100%" />
                <h2>Help</h2>
                <p>Retrouvez ici toutes les aides pour gérer au mieux le site.</p>
                <a class="" href="faq.php">Accédez aux aides</a>
            </div><!-- .article -->
             
             
            <div style="clear:both"></div>

             
        </div><!-- #articles -->


         
    </div><!-- #page -->


     
