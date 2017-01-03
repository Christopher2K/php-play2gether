<!DOCTYPE html>
<?php 
   include 'includes/header_admin.php'; 
    include 'bdd.php';
   
   if(!empty($_POST['search']))
   {
     $search=$_POST['search'];
	 echo 'YO';
   }

   ?>
<!-- Annonce Section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style type="text/css">


</style>
<section id="annonce" class="bg-light-gray">

<div class="col-lg-12 text-center">
   <h2 class="section-heading">Sport Manager</h2>

   <hr />
   <h3 class="section-subheading text-muted"></h3>
</div>
<center>


</div>
<button onclick="toggleForm()" type="submit">Ajouter un sport</button>
<br></br>
<form id="formulaire" style="display:none;" method="POST" action="ajout_sport.php" >
    <input name="sport"></input>
    <input type="submit"/>
</form>
<br> <br>

      
<table class="">
   <thead>

  
        <tr>
         <th class="text-center">Nom du sport</th>
		 <th class="text-center">Actions</th>
	
		</tr>
		
		


  
<?php 

$query="SELECT * FROM Sport";

$resultNBR = mysqli_query($base,$query);


// Utilisation du résultat
while ($row1 = mysqli_fetch_assoc($resultNBR)) {
    echo '<tr>';
	echo '<td class="text-center">';
	echo $row1['name'];
	echo '</td>';
	echo '<td class="text-center">';
	echo '<a onclick="supprimer('.$row1['id_sport'].')">DELETE </a>';
	echo '</td>';
	echo '</tr>';
	
	
	
}

		
     
?>     
      
   </thead>
 
</table>
	

   
   <script>
function supprimer(iduser) {
    var txt;
	var id_user=iduser;
    var r = confirm("La suppression de ce sport entrainera la suppression de toutes les annonces associées, en êtes vous sûr ?");
    if (r == true) {
        document.location.href="delete_sport.php?id_sport="+iduser
        
    }
    document.getElementById("demo").innerHTML = txt;
}

function toggleForm(){
    // on réccupère l'élément form.
    var formulaire = document.getElementById('formulaire');
  
    // Condition pour afficher/cacher le formulaire en fonction de son état
    if(formulaire.style.display == 'block'){
        formulaire.style.display = 'none';
    }else{
        formulaire.style.display = 'block';
    }
}

</script>

   </thead>
 
</table>
