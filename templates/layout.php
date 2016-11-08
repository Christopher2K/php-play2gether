<?php

    /**
     * Return the common header
     * @param $title: Page title -> Play2Gether . $title
     * @return HTML Code
     */
    function getHead($title) {
        ?>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Play2Gether - <?php echo $title ?></title>

            <!-- Vendor -->
            <link href="/statics/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="/statics/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <!-- Custom Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="/statics/style/css/play2gether-theme.css" rel="stylesheet" type="text/css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <?php
    }

    /**
     * Return the common scripts
     * @return HTML Code
     */
    function getScripts() {
        ?> 
            <!-- Scripts -->
            <script src="/statics/vendor/jquery/dist/jquery.min.js"></script>
            <script src="/statics/vendor/jquery-ui/jquery-ui.min.js"></script>
            <script src="/statics/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <?php

    }

    /**
     * Return the common menu
     * @return HTML Code
     */
    function getMenu() {
        ?>
            <nav class="Navbar Navbar--initial">
                <div class="Navbar-logo">
                    Play2Gether Logo + Name
                </div>
                <ul class="Navbar-items">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Matchs</a></li>
                    <li><a href="#">Résultat</a></li>
                    <li><a href="#">Inscription</a></li>
                    <li><a href="#">Connexion</a></li>
                </ul>
            </nav>
        
        <?php
    }

    /**
     * Return the common footer
     * @return HTML Code
     */
    function getFooter() {
        ?>

        <?php
    }
?>