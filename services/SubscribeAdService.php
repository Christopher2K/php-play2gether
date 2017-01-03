<?php

require_once(__DIR__ . '/../module/Connection.php');
require_once(__DIR__ . '/../module/Session.php');

require_once(__DIR__ . '/../entity/User.php');
require_once(__DIR__ . '/../entity/Ad.php');

require_once(__DIR__ . '/../dao/AdDAO.php');
require_once(__DIR__ . '/../dao/UserDAO.php');

// Prend en paramètre deux User
function send_mail($proprietaire,$participant)
{
$headers = "From: noreply@sport2gether.com\n"; // ??

$mail_to_proprietaire="Bonjour ! Votre annonce a été acceptée ! 
Vous pouvez contacter la personne dès maintenant : '.$participant->getLastName().' '.$participant->getFirstName().' ,Tel : '.$participant->getNumber().'" ;
$mail_to_participant="Bonjour ! Vous venez d'accepter une annonce !
Vous pouvez contacter la personne dès maintenant : '.$proprietaire->getLastName().' '.$proprietaire->getFirstName().' ,Tel : '.$proprietaire->getNumber().'" ;

$email_subject="Rentrez en contact dès maintenant avec votre partenaire !";

mail($proprietaire->getEmail(),$email_subject,$mail_to_proprietaire,$headers);
mail($participant->getEmail(),$email_subject,$mail_to_participant,$headers);

}

// Prend en paramètre deux User
function send_sms($proprietaire,$participant)
{
$nic="br150098-ovh";
$pass="Bibi60870!";
$sms_compte="sms-br150098-1";
$from="Sport2Get";

$to_proprietaire=$proprietaire->getNumber();
$to_participant=$participant->getNumber();

// Message pour le proprietaire de l'annonce'
$message_to_proprietaire="Bonjour ! Votre annonce a été acceptée ! 
Vous pouvez contacter la personne dès maintenant : '.$participant->getLastName().' '.$participant->getFirstName().' ,Tel : '.$participant->getNumber().'" ;

// Message pour le participant de l'annince'
$message_to_participant="Bonjour ! Vous venez d'accepter une annonce !
Vous pouvez contacter la personne dès maintenant : '.$proprietaire->getLastName().' '.$proprietaire->getFirstName().' ,Tel : '.$proprietaire->getNumber().'" ;

// ouverture de la fonction soapi
try
{
// on travail en soapi
$soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");
$session = $soap->login("$nic", "$pass","fr", false);

// affichage de la reponse pour la connexion
echo "login successfull\n";
//Envoie du message pour le proprietaire
$result_proprietaire = $soap->telephonySmsSend($session, "$sms_compte", "$from", "$to_proprietaire", "$message_to_proprietaire", "", "1", "", "");
$result_participant = $soap->telephonySmsSend($session, "$sms_compte", "$from", "$to_participant", "$message_to_participant", "", "1", "", "");

// affichage de l etat
echo "telephonySmsSend successfull\n";

// affichage du resultat
print_r($result_proprietaire);
print_r($result_participant);

// on ferme la connexion au manager
$soap->logout($session);
// affichage de la reponse de fermeture de connexion
echo "logout successfull\n";

}

catch(SoapFault $fault)
{
// affichage des erreurs
echo $fault;
}

}







// Récupère le nom,prénom,num de tel de la personne qui participe à l'annonce
$session = Session::getInstance();
$user = $session->readSession('user');

// Récupère le User qui a déposé l'annonce (?) si tu pouvais le faire :D 
//$ad->getCreatorFk(); ?? 
// Pour le reste je prends $proprietaire ( User proprietaire )



//Si les deux numéros de téléphone ont été renseignés :

if(($user->getNumber()!= NULL) && ($proprietaire->getNumber()!= NULL))  
{
    send_sms($proprietaire,$user);
}

//Envoie des mails
if(($user->getEmail()!= NULL) && ($proprietaire->getEmail()!= NULL))  
{
    send_email($proprietaire,$user);
}




// Ici t'ajoutes ton bloc sur l'ajout d'une notification, et le changement d'état de l'annonce ( et autre )







 ?>