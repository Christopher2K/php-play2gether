<?php

/**
 * Return the common header
 * @param $title : Page title -> Play2Gether . $title
 * @return HTML Code
 */
function getHead($title)
{
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
    <link href="/statics/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

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
function getScripts()
{
    ?>
    <!-- Scripts -->
    <script src="/statics/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/statics/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="/statics/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/statics/vendor/jquery-scrollspy/jquery-scrollspy.min.js"></script>
    <script src="/statics/vendor/select2/dist/js/select2.full.min.js"></script>

    <script src="/statics/script/menu.js"></script>
    <script src="/statics/script/search.js"></script>
    <?php

}

/**
 * Return the common menu
 * @return HTML Code
 */
function getMenu($session)
{
    ?>
    <nav class="Navbar Navbar--initial">
        <div class="Navbar-logo">
            <img src="/statics/img/logo-small.png"/>
        </div>
        <div class="Navbar-burger">
            <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
        </div>
        <ul class="Navbar-items">
            <li><a href="/">Accueil</a></li>
            <?php
            if (!$session->userIsLogged()) {
                ?>
                <li><a href="/inscription.php">Inscription</a></li>
                <li><a href="/connexion.php">Connexion</a></li>
                <?php
            } else {
                ?>
                <li><a href="/annonces.php">Les annonces</a></li>
                <li><a href="/profil.php">Profil</a></li>
                <li><a href="/deconnexion.php">Deconnexion</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>

    <div class="SearchBox SearchBox--inactive">
        <div class="SearchBox-header">
            <h3>Trouve ta partie !</h3>
        </div>

        <div class="SearchBox-inputField">
            <div class="inputField-sport">
                <label for="search-sport">Entre ton sport</label>
                <input type="text" name="search-sport" id="search-sport"/>
            </div>

            <div class="inputField-date">
                <label for="search-date">Choisis une date</label>
                <input type="text" name="search-date" id="search-date"/>
            </div>

            <div class="inputField-location">
                <label for="search-location">Choisi un endroit</label>
                <input type="text" name="search-location" id="search-location"/>
            </div>
        </div>

        <div>
            ICI FILTRES
        </div>

        <div>
            <button>Rechercher</button>
        </div>
    </div>

    <?php
}

/**
 * Return the common call 2 action
 * @return HTLM Code
 */
function getCallToAction($tagLine)
{
    ?>
    <button class="call2Action">Rejoins la communauté !</button>
    <?php
}

/**
 * Return the common footer
 * @return HTML Code
 */
function getFooter()
{
    ?>
    <footer class="Footbar">
        <p class="Footbar-copyright">Copyright &copy; Play2Gether 2016</p>
        <div class="Footbar-socials">
            <a href="#"><i style="padding-right: 2px; padding-top: 1px;" class="fa fa-facebook " aria-hidden="true"></i></a>
            <a href="#"><i style="" class="fa fa-twitter " aria-hidden="true"></i></a>
        </div>
        <div class="Footbar-legals">
            <a href="#">Mentions légales</a>
        </div>
    </footer>
    <?php
}

/**
 * Return the contact form
 * @return HTML Code
 */
function getContactForm()
{
    ?>
    <section class="Contact">
        <div class="Contact-header">
            <h2>Nous contacter</h2>
            <hr/>
            <p>Une question ? Un renseignement ? N'hésitez pas à nous faire part.</p>
        </div>

        <div class="Contact-content">
            <form class="Content-form">
                <div class="Form-fields">
                    <div class="Fields-left">
                        <input type="text" name="nom_contact" id="nom_contact" placeholder="NOM &bull;" required/>
                        <input type="text" name="prenom_contact" id="prenom_contact" placeholder="PRENOM &bull;"
                               required/>
                        <input type="email" name="email_contact" id="email_contact" placeholder="ADRESSE MAIL &bull;"
                               required/>
                        <input type="tel" name="telephone_contact" id="telephone_contact" placeholder="TÉLÉPHONE &bull;"
                               required/>
                    </div>

                    <div class="Fields-right">
                        <textarea name="message_contact" id="message_contact" placeholder="MESSAGE"></textarea>
                    </div>
                </div>

                <div class="Form-submit">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>

    </section>
    <?php
}

?>
