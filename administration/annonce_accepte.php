<?php 

// Bloc création de la notification 







//entrer votre nic-handle, remplacer xx123456-ovh par votre propre nic-handle
$nic="br150098-ovh";

//entrer le mot de passe de votre nic-handle, remplacer ovh123456 par votre propre mot de passe
$pass="Bibi60870!";

//entrer le nom de votre compte sms, remplacer sms-xx123456-1 par votre propre compte
$sms_compte="sms-br150098-1";

/*entrer le numéro emetteur du sms, ce numéro doit etre identifie dans votre manager,
remplacer +33600110011 par votre propre numero de mobile*/
$from="Sport2Get";


/* creation de la variable to dans laquelle nous recuperons via la methode post
le champ portant le nom destinataire au niveau de la page form.html */
$to="+33777950491";

/* creation de la variable message dans laquelle nous recuperons via la methode post
le champ portant le nom texte au niveau de la page form.htlm */
$message="Votre annonce a été accepté ! Voici les informations : Christopher N Katoyi " ;

// ouverture de la fonction soapi
try
{
// on travail en soapi
$soap = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");

/* connexion a votre manager avec vos identifiants, ici on utilise
le compte xx123456-ovh ($nic) avec le mot de passe ovh123456 ($pass), le nic-handle est francais */
$session = $soap->login("$nic", "$pass","fr", false);

// affichage de la reponse pour la connexion
echo "login successfull\n";

/* on utilise ici le compte sms sms-xx123456-1 ($sms_compte) pris sur notre nic-handle xx123456-ovh,
le numero 06600110011 ($from) a ete identifie dans notre manager on l utilise donc en tant
qu emetteur, le desinataire se place ensuite ($to), la variable $message contient le texte du sms, le vide permet de laisser
les parametres par defaut, le "1" force l envoi du sms au format classique,
le sms est sauvegarde sur le portable client */
$result = $soap->telephonySmsSend($session, "$sms_compte", "$from", "$to", "$message", "", "1", "", "");

// affichage de l etat
echo "telephonySmsSend successfull\n";

// affichage du resultat
print_r($result);

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

// fermeture de la balise php

?> 
