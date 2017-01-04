<?php 

include 'bdd.php';

if(!isset($_GET['id_sport'])){

$email_body = "Un nombre important d'annonces a été déposé ! C'est le bon moment pour vous de faire du sport ! Connectez vous au site et recherchez ce qui vous intéresse ! A bientot ;) ";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$query = "SELECT * FROM User"; 

$resultNBR = mysqli_query($base,$query);


// Utilisation du résultat
while ($row1 = mysqli_fetch_assoc($resultNBR)) {
	$prenom = $row1['last_name'];
	$email_subject = "$prenom, des gens vous attendent pour faire du sport ! ";
	$to = $row1['email'];
	if(mail($to,$email_subject,$email_body,$headers)){
		echo 'Mails envoyés !';
		
	}
   
	
}

header('Location:annonce_manager.php');

}
else{
$sport=$_GET['nom_sport'];
$email_body = "Connaissez-vous ce sport : $sport ! Profitez-en pour le faire découvrir aux autres ! Il est important pour la communauté de découvrir d'autres sports ! A bientot ;) ";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$query = "SELECT * FROM User"; 

$resultNBR = mysqli_query($base,$query);


// Utilisation du résultat
while ($row1 = mysqli_fetch_assoc($resultNBR)) {
	$prenom = $row1['last_name'];
	$email_subject = "$prenom, connaissez-vous ce sport ? ";
	$to = $row1['email'];
	mail($to,$email_subject,$email_body,$headers);
		
		
	
	    
	
}

header('Location:annonce_manager.php');

}
?>