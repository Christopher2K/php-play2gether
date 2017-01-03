<?php 
 
     include 'bdd.php';
   
   if(!empty($_GET['id_user']))
   {
   $id_user = addslashes($_GET['id_user']);
   
   $query="UPDATE User SET is_admin=1 WHERE id_user=$id_user";
   mysqli_query($base,$query); 
  header('Location:user_manager.php');
   }
   else
   header('Location:user_manager.php');
   
   

   ?>