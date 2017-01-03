<?php 
 
     include 'bdd.php';
   
   if(!empty($_GET['id_user']))
   {
   $id_user = addslashes($_GET['id_user']);
   
   $supprimerUserSport="DELETE FROM UserSport WHERE user_fk=$id_user";
   $query="DELETE FROM User WHERE id_user=$id_user";
   mysqli_query($base,$supprimerUserSport);
   mysqli_query($base,$query); 
  header('Location:user_manager.php');
   }
   else
   header('Location:user_manager.php');
   
   

   ?>