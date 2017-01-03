<?php 
 
     include 'bdd.php';
   
   if(!empty($_GET['id_sport']))
   {
   $id_sport = addslashes($_GET['id_sport']);

   $delete_annonce = "DELETE FROM Ad WHERE sport_fk=$id_sport";
   
   $delete_sport="DELETE FROM Sport WHERE id_sport=$id_sport";
  

  mysqli_query($base,$delete_annonce); 
   mysqli_query($base,$delete_sport); 
  header('Location:sport_manager.php');
   }
   else
   header('Location:sport_manager.php');
   
   

?>