<?php require('templates/layout.php') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
            $title = 'Accueil';
            getHead($title); 
        ?>
    </head>

    <body>
        <?php getMenu(); ?>
        <?php getScripts(); ?>
        <!-- Script custom -->

    </body>
</html>
