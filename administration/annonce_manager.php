<!DOCTYPE html>
<?php 
   include 'includes/header_admin.php'; 
    include 'bdd.php';
   


   ?>
<!-- Annonce Section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">


</style>
<section id="fond" class="bg-light-gray">

<div class="col-lg-12 text-center">
   <h2 class="section-heading">Annonce Manager</h2>

   <hr />
   <h3 class="section-subheading text-muted"></h3>
</div>
<center>


</div>


      
<table class="">
   <thead>

  
        <tr>
         <th class="text-center">Informations</th>
		 <th class="text-center">Actions</th>
	
		</tr>
		
		


  
<?php 

//Requête permettant de connaitre le nombre d'annonces à accepter 
$nbrAnnonces="SELECT count(*) AS NBR FROM Ad WHERE status_fk=2";

//Requête permettant de connaitre le nombre d'annonces à accepter 
$nbrAnnonces="SELECT count(*) AS NBR FROM Ad WHERE status_fk=2";

$resultNBR = mysqli_query($base,$nbrAnnonces);


// Utilisation du résultat
while ($row1 = mysqli_fetch_assoc($resultNBR)) {

    echo '<tr>';
	echo '<td class="text-center">';
	echo $row1['NBR'];
  echo ' annonce(s) sont à accepter';
	echo '</td>';
	echo '<td class="text-center">';
	echo '<a onclick="LancerCampagne()">Lancer une campagne de Mail</a>';
	echo '</td>';
	echo '</tr>';
}


		
     
?>     
      
   </thead>
 
</table>
	<br></br>

<table class="">
   <thead>

  
        <tr>
         <th class="text-center">Les 3 derniers sports</th>
		 <th class="text-center">Actions</th>
	
		</tr>    

<?php

//Les 3 derniers sports 
	$requete12 = "SELECT id_sport,Sport.name AS NOM,
		count(Sport.name) as NBR
from Ad
join Sport
on Ad.sport_fk = Sport.id_sport 
group by Sport.name
ORDER BY count(Sport.name) ASC
LIMIT 0,3 ";

$resultNBR = mysqli_query($base,$requete12);

while ($row1 = mysqli_fetch_assoc($resultNBR)) {

    echo '<tr>';
	echo '<td class="text-center">';
	echo $row1['NOM'];
   $nom= $row1['NOM'];
  $idsport=$row1['id_sport'];
	echo '</td>';
	echo '<td class="text-center">';
	echo '<a onclick="LancerCampagneSport('.$idsport.',\''.$nom. '\')">Lancer une campagne de Mail</a>';
	echo '</td>';
	echo '</tr>';
}
?>


   
   <script>
function LancerCampagneSport(idsport,nomsport) {
    var txt;
    var id_sport=idsport;
    var nomsport=nomsport;
    
    var r = confirm("Etes vous sûr de vouloir envoyer une campagne de publicité pour ce sport ?");
    if (r == true) {
        document.location.href="campagne_mail.php?id_sport="+id_sport+"&nom_sport="+nomsport
        
    }
  
}

function LancerCampagne() {
    var txt;

    var r = confirm("Etes vous sûr de vouloir envoyer une campagne de publicité ?");
    if (r == true) {
        document.location.href="campagne_mail.php"
        
    }
    document.getElementById("demo").innerHTML = txt;
}

</script>

   </thead>
 
</table>
