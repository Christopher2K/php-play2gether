<?php require('templates/layout.php') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
            $title = 'Accueil';
            getHead($title); 
        ?>
    </head>

    <body class="Index">
        <?php getMenu(); ?>

        <header class="IndexHeader">
            <div class="IndexHeader-content">
                <img src="/statics/img/logo.png" alt="Logo"/>
                <h2>Trouve ton équipe et joue dès maintenant !</h2>
            </div>
        </header>

        <section>
            <div>
                <h2>Le concept</h2>
                <hr />
                <p></p>
            </div>

            <div>
                <p>T'es du genre sportif ? Toujours prêt pour une partie de futsal, de basket ?</p>
                <p>Tu cherches des joueurs disponibles et déterminés autour de chez toi ?</p>
                <p>Il te manque un joueur pour compléter ta team ?</p>

                <p>Play2Gether est fait pour toi !</p>

                <p>Un process simple</p>

                <?php getCallToAction(); ?>
            </div>
        </section>

        <section>
            <div>
                <h2>Recrutements en cours</h2>
                <hr />
                <p></p>
            </div>

            <div>
                <div>
                    <h3>Football Américain</h3>
                    <p><span>Lieu : </span> Amiens</p>
                    <p><span>Date : </span> 01/01/2017</p>
                    <p><span>Participants : </span> 10</p>
                    <button>Rejoindre</button>
                </div>

                <div>
                    <h3>Football Américain</h3>
                    <p><span>Lieu : </span> Amiens</p>
                    <p><span>Date : </span> 01/01/2017</p>
                    <p><span>Participants : </span> 10</p>
                    <button>Rejoindre</button>
                </div>

                <div>
                    <h3>Football Américain</h3>
                    <p><span>Lieu : </span> Amiens</p>
                    <p><span>Date : </span> 01/01/2017</p>
                    <p><span>Participants : </span> 10</p>
                    <button>Rejoindre</button>
                </div>

                <div>
                    <h3>Football Américain</h3>
                    <p><span>Lieu : </span> Amiens</p>
                    <p><span>Date : </span> 01/01/2017</p>
                    <p><span>Participants : </span> 10</p>
                    <button>Rejoindre</button>
                </div>
            </div>
        </section>

        <section class="Call2Action">
            <div class="Call2Action-header">
                <h2>Rejoignez nous maintenant</h2>
                <hr />
                <p>On vous attend sur les terrains prêt de chez vous.</p>
            </div>

            <div class="Call2Action-button">
                <button><a href="">Rejoignez nous !</a></button>
            </div>
        </section>

        <section class="Team">
            <div class="Team-header">
                <h2>L'Équipe</h2>
                <hr />
                <p>Retrouvez nous !</p>
            </div>

            <div class="Team-tagLine">
                <h4>Ce projet a été réalisé dans le cadre de l'UE Gestion de Projet, formation MIAGE à l'Université de Picardie de Jules Vernes</h4>
            </div>

            <div class="Team-members">
                <div class="Member">
                    <img />
                    <p class="Member-name">Remi BOISEAUBERT</p>
                    <p class="Member-title">Développeur PHP</p>
                    <p class="Member-job">Chef de projet</p>
                    <ul class="Member-socials">
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="Member">
                    <img />
                    <p class="Member-name">Christopher N. KATOYI-KABA</p>
                    <p class="Member-title">Développeur Fullstack</p>
                    <p class="Member-job">Chargé de documentation</p>
                    <ul class="Member-socials">
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="Member">
                    <img />
                    <p class="Member-name">Tarek ELMARSI</p>
                    <p class="Member-title">Développeur Php</p>
                    <p class="Member-job">Responsable du carnet de bord</p>
                    <ul class="Member-socials">
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="Team-members">
                <div class="Member">
                    <img />
                    <p class="Member-name">Florian SAINT-LEGER</p>
                    <p class="Member-title">Web designer</p>
                    <p class="Member-job">Chargé de communication</p>
                    <ul class="Member-socials">
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="Member">
                    <img />
                    <p class="Member-name">Fabien LAMOTTE</p>
                    <p class="Member-title">Intégrateur front-end</p>
                    <p class="Member-job">Client</p>
                    <ul class="Member-socials">
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="Social">
                            <a href="">
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
