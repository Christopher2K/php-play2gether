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

        <header class="IndexHeader">
            <div class="IndexHeader-content">
                <img src="/statics/img/logo.png" alt="Logo"/>
<!--                <h1>Play2Gether</h1>-->
                <h2>Trouve ton équipe et joue dès maintenant !</h2>
            </div>
        </header>

        <section>
            <div>
                <h2>Le concept</h2>
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

        <section>
            <div>
                <h2>L'Équipe</h2>
            </div>

            <div>
                <p>Ce projet a été réalisé dans le cadre de l'UE Gestion de Projet, formation MIAGE à l'Université de Picardie de Jules Vernes</p>
            </div>

            <div>
                <div>
                    <img />
                    <p>Remi BOISEAUBERT</p>
                    <p>Développeur PHP</p>
                    <p>Chef de projet</p>
                </div>

                <div>
                    <img />
                    <p>Christopher N. KATOYI-KABA</p>
                    <p>Développeur Fullstack</p>
                    <p>Chargé de documentation</p>
                </div>

                <div>
                    <img />
                    <p>Tarek ELMARSI</p>
                    <p>Développeur Php</p>
                    <p>Responsable du carnet de bord</p>
                </div>

                <div>
                    <img />
                    <p>Florian SAINT-LEGER</p>
                    <p>Web designer</p>
                    <p>Chargé de communication</p>

                </div>

                <div>
                    <img />
                    <p>Fabien LAMOTTE</p>
                    <p>Intégrateur front-end</p>
                    <p>Client</p>
                </div>
            </div>
        </section>

        <?php getFooter(); ?>

        <?php getScripts(); ?>
        <!-- Script custom -->

    </body>
</html>
