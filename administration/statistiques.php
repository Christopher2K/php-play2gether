<!DOCTYPE html>
<?php 
   include 'includes/header_admin.php'; 
   
   
   ?>
   
   <?php 
   
      include 'bdd.php';
	
	//Nbr inscrits
	$requete1 = "SELECT COUNT(*) AS NBR FROM User WHERE is_admin <> 1 ";
	if(!empty($date))
	 {$requete1.="AND MONTH(DATE_INSCRIPTION)='$date'";}
	//Nbr inscrits H
	$requete2 = "SELECT COUNT(*) AS NBR FROM User WHERE is_admin <> 1 AND User.gender=0 ";
	if(!empty($date))
	 {$requete2.="AND MONTH(DATE_INSCRIPTION)='$date'";}
	//Nbr inscrits F
	$requete3 = "SELECT COUNT(*) AS NBR FROM User WHERE is_admin <> 1 AND User.gender=1 ";
		if(!empty($date))
	 {$requete3.="AND MONTH(DATE_INSCRIPTION)='$date'";}
	//Nbr inscrits 12-25 ans
	$requete4 = "SELECT COUNT(*) AS NBR FROM User WHERE is_admin <> 1 AND FLOOR(DATEDIFF(CURDATE(),birth_date)/365) < 26 AND FLOOR(DATEDIFF(CURDATE(),birth_date)/365) > 11 ";
		if(!empty($date))
	 {$requete4.="AND MONTH(DATE_INSCRIPTION)='$date'";}
    //Nbr inscrits 26-40 ans
	$requete5 = "SELECT COUNT(*) AS NBR FROM User WHERE is_admin <> 1 AND FLOOR(DATEDIFF(CURDATE(),birth_date)/365) < 41 AND FLOOR(DATEDIFF(CURDATE(),birth_date)/365) > 25 ";
		if(!empty($date))
	 {$requete5.="AND MONTH(DATE_INSCRIPTION)='$date'";}
	//Nbr inscrits +40 ans
	$requete6 = "SELECT COUNT(*) AS NBR FROM User WHERE is_admin <> 1 AND FLOOR(DATEDIFF(CURDATE(),birth_date)/365) > 40 ";
		if(!empty($date))
	 {$requete6.="AND MONTH(DATE_INSCRIPTION)='$date'";}
	
	
	//Nbr Annonces 
	$requete7 = "SELECT COUNT(*) AS NBR FROM Ad ";
	if(!empty($date))
	 {$requete7.="WHERE MONTH(DATEANNONCE)='$date'";}
	//Nbr Annonces/Jour
	$requete8 = "SELECT COUNT(*)/(DATEDIFF(sysdate(),'2016-01-01')) AS NBR FROM Ad ";
	if(!empty($date))
	 {$requete8.="where MONTH(DATEANNONCE)='$date'";}
	//Nbr Annonces acceptés
	$requete9 = "SELECT COUNT(*) AS NBR FROM Ad WHERE status_fk=3 ";
	if(!empty($date))
	 {$requete9.="AND MONTH(DATEANNONCE)='$date'";}
	//Meilleure région
	$requete10="SELECT Region.name AS LIBELLE, count(Region.name) AS NBR from Ad join City villes on Ad.city_fk = villes.id_city join Department on villes.department_fk = Department.id_department join Region on Department.region_fk = Region.id_region group by Region.name LIMIT 0,1 ";
	if(!empty($date))
	 {$requete10="SELECT Region.name AS LIBELLE, count(Region.name) AS NBR from Ad join City villes on Ad.city_fk = villes.id_city join Department on villes.department_fk = Department.id_department join region on Department.region_fk = Region.id_region  WHERE MONTH(Ad.created_on)='$date' group by Region.name LIMIT 0,1";}
	//Meilleur sport
	$requete11 = "SELECT Sport.name AS NOM,
		count(Sport.name) as NBR
from Ad
join Sport
on Ad.sport_fk = Sport.id_sport 
group by Sport.name
ORDER BY count(Sport.name) desc
LIMIT 0,1 ";



if(!empty($date))
	 {$requete11="SELECT sport.name AS NOM,
		count(sport.name) as NBR
from Ad
join sport
on Ad.sport_fk = sport.id_sport 
WHERE MONTH(DATEANNONCE)='$date' 
group by sport.name
ORDER BY count(sport.name) desc
LIMIT 0,1 ";}

	
	
	
	
	
	// Exécution des requêtes
	$result1 = mysqli_query($base,$requete1);
	$result2 = mysqli_query($base,$requete2);
	$result3 = mysqli_query($base,$requete3);
	$result4 = mysqli_query($base,$requete4);
	$result5 = mysqli_query($base,$requete5);
	$result6 = mysqli_query($base,$requete6);
	$result7 = mysqli_query($base,$requete7);
	$result8 = mysqli_query($base,$requete8);
	$result9 = mysqli_query($base,$requete9);
	$result10 = mysqli_query($base,$requete10);
	$result11 = mysqli_query($base,$requete11);
//	$result12 = mysqli_query($base,$requete12);


// Utilisation du résultat
while ($row1 = mysqli_fetch_assoc($result1)) {
    $nbrInscrits=$row1['NBR'];
}

while ($row2 = mysqli_fetch_assoc($result2)) {
    $nbrHommes=$row2['NBR'];
}

while ($row3 = mysqli_fetch_assoc($result3)) {
    $nbrFemmes=$row3['NBR'];
}

while ($row4 = mysqli_fetch_assoc($result4)) {
    $nbr1225=$row4['NBR'];
}

while ($row5 = mysqli_fetch_assoc($result5)) {
    $nbr2640=$row5['NBR'];
}

while ($row6 = mysqli_fetch_assoc($result6)) {
    $nbr40=$row6['NBR'];
}

while ($row7 = mysqli_fetch_assoc($result7)) {
    $nbrAnnonces=$row7['NBR'];
}

while ($row8 = mysqli_fetch_assoc($result8)) {
    $nbrParJour=$row8['NBR'];
}

while ($row9 = mysqli_fetch_assoc($result9)) {
    $nbrAnnoncesAcceptes=$row9['NBR'];
}


while ($row10 = mysqli_fetch_assoc($result10)) {
    $nbrAnnonceParRegion=$row10['NBR'];
	$meilleureRegion=$row10['LIBELLE'];
}

while ($row11 = mysqli_fetch_assoc($result11)) {
    $meilleurSport=$row11['NOM'];
	$nombreSport=$row11['NBR'];
}



   ?>
<!-- Annonce Section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<section id="fond" class="bg-light-gray">

<div class="col-lg-12 text-center">
   <h2 class="section-heading">Statistiques</h2>
   <hr />
   <h3 class="section-subheading text-muted"></h3>
</div>
<center>


             
<table class="">
   <thead>

                  
               
        <tr>
         <th class="text-center">Nombre d'inscrits</th>
		 <td class="text-center"><?php echo $nbrInscrits ?> </td>
		 <th class="text-center">Nombre d'annonces</th>
		 <td class="text-center"><?php echo $nbrAnnonces; ?></td>
      </tr>
        <tr>
        <th class="text-center">Homme | Femme </th>
		 <td class="text-center"><?php echo "$nbrHommes | $nbrFemmes";  ?> </td>
		 <th class="text-center">Nombre d'annonces/jour</th>
		 <td class="text-center"><?php echo $nbrParJour; ?> </td>
      </tr>
         <tr>
         <th class="text-center">12-25 ans</th>
		  <td class="text-center"><?php echo $nbr1225; ?> </td>
		  <th class="text-center">Nombre d'annonces acceptées</th>
		 <td class="text-center"><?php echo $nbrAnnoncesAcceptes ?> </td>
      </tr>
         <tr>
         <th class="text-center">26-40 ans</th>
		  <td class="text-center"><?php echo $nbr2640; ?></td>
		  <th class="text-center">Meilleure région</th>
		 <td class="text-center"><?php echo $meilleureRegion; ?> :  <?php echo $nbrAnnonceParRegion; ?>  </td>
      </tr>
	  <tr>
         <th class="text-center">+ 40 ans</th>
		  <td class="text-center"><?php echo $nbr40; ?> </td>
		  <th class="text-center">Meilleur sport</th>
		 <td class="text-center"><?php echo $meilleurSport; ?> : <?php echo $nombreSport; ?></td>
      </tr>
      
   </thead>
 
</table>



<br> <br>

<script type="text/javascript">
   function showValue(newValue)
   {
       document.getElementById("range").innerHTML=newValue + " KM";
   }

$('select').on('change', function() {
  $date=this.value;
}) 


</script>