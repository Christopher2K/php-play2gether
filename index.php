<?php
require_once(__DIR__ . '/module/Session.php');
require_once(__DIR__ . '/templates/layout.php');
require_once(__DIR__ . '/module/Connection.php');

$session = Session::getInstance();
$connection = Connection::getInstance();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $title = 'Accueil';
    getHead($title);
    ?>
</head>

<body class="Index">
<?php getMenu($session); ?>

<header class="Header">
    <div class="Header-content">
        <img src="/statics/img/logo.png" alt="Logo"/>
        <h2>Trouve ton équipe et joue dès maintenant !</h2>
    </div>
</header>

<section class="Concept">
    <div class="Concept-header">
        <h2>Le concept</h2>
        <hr/>
        <p>Une nouvelle manière de pratiquer ton sport.</p>
    </div>

    <div class="Concept-content">
        <p>T'es du genre sportif ? Toujours prêt pour une partie de futsal, de basket ?</p>
        <p>Tu recheche juste des gens avec qui courir, nager, ou pédaler ?</p>
        <p>Tu cherches des sportifs disponibles et déterminés autour de chez toi ?</p>
        <p>Il te manque quelqu'un pour compléter ta team ?</p>

        <p class="Content-bigger">Play2Gether est fait pour toi !</p>

        <button><a href="inscription.php">Rejoignez nous !</a></button>
    </div>
</section>

<section class="Games">
    <div class="Games-header">
        <h2>Recrutements en cours</h2>
        <hr/>
        <p>Découvrez les sessions de sports disponibles !</p>
    </div>

    <div class="Games-cards">
        <div class="Card">
            <div class="Card-header">
                <h3>Football Américan</h3>
            </div>
            <div class="Card-content">
                <p><span>Lieu : </span> Amiens</p>
                <p><span>Date : </span> 01/01/2017</p>
                <p><span>Participants : </span> 10</p>
                <button>Rejoindre</button>
            </div>
        </div>

        <div class="Card">
            <div class="Card-header">
                <h3>Football Américan</h3>
            </div>
            <div class="Card-content">
                <p><span>Lieu : </span> Amiens</p>
                <p><span>Date : </span> 01/01/2017</p>
                <p><span>Participants : </span> 10</p>
                <button>Rejoindre</button>
            </div>
        </div>

        <div class="Card">
            <div class="Card-header">
                <h3>Football Américan</h3>
            </div>
            <div class="Card-content">
                <p><span>Lieu : </span> Amiens</p>
                <p><span>Date : </span> 01/01/2017</p>
                <p><span>Participants : </span> 10</p>
                <button>Rejoindre</button>
            </div>
        </div>

        <div class="Card">
            <div class="Card-header">
                <h3>Football Américan</h3>
            </div>
            <div class="Card-content">
                <p><span>Lieu : </span> Amiens</p>
                <p><span>Date : </span> 01/01/2017</p>
                <p><span>Participants : </span> 10</p>
                <button>Rejoindre</button>
            </div>
        </div>
    </div>
</section>

<section class="Team">
    <div class="Team-header">
        <h2>L'Équipe</h2>
        <hr/>
        <p>Retrouvez nous !</p>
    </div>

    <div class="Team-tagLine">
        <h4>Ce projet a été réalisé dans le cadre de l'UE Gestion de Projet, formation MIAGE à l'Université de
            Picardie de Jules Vernes</h4>
    </div>

    <div class="Team-members">
        <div class="Member">
            <img src="/statics/img/remib.jpg"/>
            <p class="Member-name">Remi BOISEAUBERT</p>
            <p class="Member-title">Développeur PHP</p>
            <p class="Member-job">Chef de projet</p>
            <ul class="Member-socials">
                <li class="Social">
                    <a href="https://www.facebook.com/remi.boiseaubert">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://twitter.com/_devicZ">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://fr.linkedin.com/in/rémi-boiseaubert-907524118">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="Member">
            <img src="/statics/img/chrisnk.jpg"/>
            <p class="Member-name">Christopher N. KATOYI-KABA</p>
            <p class="Member-title">Développeur Fullstack</p>
            <p class="Member-job">Chargé de documentation</p>
            <ul class="Member-socials">
                <li class="Social">
                    <a href="https://www.facebook.com/KeazyChris">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="http://twitter.com/Christopher_2K">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://fr.linkedin.com/in/christopherkatoyi">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="Member">
            <img src="/statics/img/tarekem.jpg"/>
            <p class="Member-name">Tarek ELMARSI</p>
            <p class="Member-title">Développeur Php</p>
            <p class="Member-job">Responsable du carnet de bord</p>
            <ul class="Member-socials">
                <li class="Social">
                    <a href="https://www.facebook.com/tarek.elmarssi">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://fr.linkedin.com/in/tarek-el-marssi-a04485b8">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="Team-members">
        <div class="Member">
            <img src="/statics/img/flosl.jpg"/>
            <p class="Member-name">Florian SAINT-LEGER</p>
            <p class="Member-title">Web designer</p>
            <p class="Member-job">Chargé de communication</p>
            <ul class="Member-socials">
                <li class="Social">
                    <a href="https://www.facebook.com/florian.saintleger">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://twitter.com/TheDarkThanatos">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://fr.linkedin.com/in/florian-saint-léger-94a838123">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="Member">
            <img src="/statics/img/fabien.jpg"/>
            <p class="Member-name">Fabien LAMOTTE</p>
            <p class="Member-title">Intégrateur front-end</p>
            <p class="Member-job">Client</p>
            <ul class="Member-socials">
                <li class="Social">
                    <a href="https://www.facebook.com/fabien.vigato">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://twitter.com/VigatoDeVega">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="Social">
                    <a href="https://fr.linkedin.com/in/fabien-lamotte-a16b3091">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</section>

<?php getContactForm() ?>

<?php getFooter(); ?>

<?php getScripts(); ?>
<!-- Script custom -->


</body>
</html>
