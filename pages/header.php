<!--the head of the page-->
<!DOCTYPE html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<!--    Site réalisé par Amine BELKEDAH et Hans CANONICO 2014-2015 -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../images/favicon.png">

        <title>isiARCHIVE</title>

        <link rel="stylesheet" type="text/css" href="../css/dropzone.css">
        <link rel="stylesheet" type="text/css" href="../css/theme.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
        <script>
            var Dropzone = require("enyo-dropzone");
            Dropzone.autoDiscover = false;
        </script>
        <script src="../javascript/jquery-2.1.3.js"></script>
        <script src="../javascript/bootstrap.min.js"></script>
        <script src="../javascript/dropzone.js"></script>
        <script src="../javascript/script.js"></script>



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">isiARCHIVE</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="recherche.php">Recherche avancée</a></li>
                        <?php
                        if (!empty($_SESSION['login'])) {
                            echo"
                    <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">Upload <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"simpleUpload.php\">Simple</a></li>
                      <li><a href=\"multiUpload.php\">Multiple</a></li>

                    </ul>
                  </li>
                    ";
                        }
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon Compte <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                if (!empty($_SESSION['login'])) {
                                    echo"
                    <li><a href=\"modifierMotDePasse.php\">Changer de mot de passe</a></li>
                    <li><a href=\"ajouterAdministrateur.php\">Ajouter un administrateur</a></li>
                    <li><a href=\"../php/deconnexionManager.php\">Se déconnecter</a></li>
                    ";
                                } else {
                                    echo"
                    <li><a href=\"connexion.php\">Se connecter</a></li>
                    ";
                                }
                                ?>


                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

