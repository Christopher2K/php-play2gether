<!DOCTYPE html>
<?php 
   include 'includes/header_admin.php'; 
   // A inclure le fichier de connexion a la place
   include 'bdd.php';
   
   if(!empty($_POST['search']))
   {
     $search=$_POST['search'];
   }

   ?>
<!-- Annonce Section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style type="text/css">


</style>
<section id="annonce" class="bg-light-gray">

<div class="col-lg-12 text-center">
   <h2 class="section-heading">User Manager</h2>
   <hr />
   <h3 class="section-subheading text-muted"></h3>
</div>
<center>

<form class="form-wrapper cf" action="user_manager.php" method="post">
 <input name="search" type="text" placeholder="Trouvez par nom, prénom, ville ou adresse mail ..." >
	  <button type="submit">Rechercher</button>
</form>
<div class="byline"></div>
</div>



<br> <br>

     <section id="annonce" class="bg-light-gray">        
	 
	 
<table class="">
   <thead>

  
        <tr>
         <th class="text-center">Nom</th>
		 <th class="text-center">Prénom</th>
		 <th class="text-center">Ville</th>
		 <th class="text-center">Adresse mail</th>
		 <th class="text-center">Admin</th>
		 <th class="text-center">Actions</th>
		</tr>
		
<?php 

$query="SELECT id_user,last_name,first_name,name AS VILLE,email,is_admin FROM User JOIN City ON City.id_city=User.city_fk LIMIT 0,25";
if(!empty($search))
	{$query="SELECT id_user,last_name,first_name,name AS VILLE,email,is_admin FROM User JOIN City ON City.id_city=User.city_fk WHERE last_name LIKE '%$search%'
	OR first_name LIKE '%$search%' OR City.name LIKE '%$search%' OR email LIKE '%$search%' LIMIT 0,25; ";} 

	
$resultNBR1 = mysqli_query($base,$query); 
$resultNBR2 = mysqli_query($base,$query); 
$row2=mysqli_fetch_assoc(($resultNBR2));


if(sizeof($row2) == 0){
    echo '<tr>';
	echo '';
	echo "Aucune personne n'a été trouvée"; 
	echo '</td>';
	echo '</tr>';
	} else {
// Utilisation du résultat
while ($row1=mysqli_fetch_assoc(($resultNBR1))) {


	
    echo '<tr>';
	echo '<td class="text-center">';
	echo $row1['last_name'];
	echo '</td>';
	echo '<td class="text-center">';
	echo $row1['first_name'];
	echo '</td>';
	echo '<td class="text-center">';
	echo $row1['VILLE'];
	echo '</td>';
	echo '<td class="text-center">';
	echo $row1['email'];
	echo '</td>';
	
	if($row1['is_admin']==1)
	{
		 echo '<td class="text-center">';
	echo 'Oui';
	echo '</td>';
	
	}
	else
	{
	 echo '<td class="text-center">';
	echo 'Non';
	echo '</td>';
	
	}
	echo '<td class="text-center">';
	$iduser= $row1['id_user'];
	echo '<a onclick="supprimer('.$iduser.')">DELETE </a>- <a onclick="admin('.$iduser.')">Admin </a>';
	echo '</td>';
	echo '</tr>';
	
	
		}	
}

		
     
?>     
   <script>
function supprimer(iduser) {
    var txt;
	var id_user=iduser;
    var r = confirm("Etes-vous sûr de vouloir supprimer cet utilisateur ?");
    if (r == true) {
        document.location.href="delete_user.php?id_user="+iduser
        
    }
    document.getElementById("demo").innerHTML = txt;
}

function admin(iduser) {
    var txt;
	var id_user=iduser;
    var r = confirm("Etes-vous sûr de rendre cet utilisateur administrateur ?");
    if (r == true) {
        document.location.href="admin_user.php?id_user="+iduser
        
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>

   </thead>
 
</table>
<script type="text/javascript">
   function showValue(newValue)
   {
       document.getElementById("range").innerHTML=newValue + " KM";
   }

$('select').on('change', function() {
  $date=this.value;
}) 


</script>