<?php 
   include 'bdd.php';
   
   if(!empty($_POST['sport']))
   {
   $sport = addslashes($_POST['sport']);


   $query="INSERT INTO `Sport` (`id_sport`,`name`) VALUES (NULL,'$sport') ";

   mysqli_query($base,$query); 
   header('Location:sport_manager.php');
   }
   else
   header('Location:sport_manager.php');
   
   

   ?>