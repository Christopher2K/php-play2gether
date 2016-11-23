<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Play2Gether - Inscriptio</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <!--<link href="css/agency.min.css" rel="stylesheet">-->
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/matchsTable.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

     <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <div class="headerlogo">
                    <a class="navbar-brand page-scroll" href="index.php"><img src="../banniere.png" alt="logo"></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="matchs.php">Matchs</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="resultats.php">Résultats</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="connexion.php">Connexion</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="inscription.php">Inscription</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="recherche.php"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        
    </header>

<!-- About Section -->
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Inscription</h2>
                    <hr />
                    <h3 class="large text-muted">Inscrivez-vous pour accéder à la plate-forme</h3>
                </div>
            </div>
                <form method="post" action="resultat.php" id="inscription">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" required data-validation-required-message="Veuillez renseigner votre Nom" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" required data-validation-required-message="Veuillez renseigner votre prénom" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <label for="id">Identifiant</label>
                            <input type="text" class="form-control" id="id" aria-describedby="id" placeholder="Identifiant">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="verifpassword">Saisir à nouveau le mot de passe</label>
                            <input type="password" class="form-control" id="verifpassword" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                           <div class="style_annonce">
                                Homme <input name="sexe" type="radio" value="homme">
                                Femme <input name="sexe" type="radio" value="femme">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="born">Date de naissance</label>
                            <input type="date" class="form-control" id="born" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" placeholder="Ville">
                        </div>
                        <div class="form-group">
                            <label for="ville">Sport</label>
                            <select>
                                <option value="volvo">Football</option>
                                <option value="saab">Tennis</option>
                                <option value="mercedes">Badminton</option>
                                <option value="audi">Hockey</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Inscription</button>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Play2Gether <?php echo @date('Y'); ?></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
