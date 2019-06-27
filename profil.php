<?php
require 'admin/assets/inc/class/user.class.php';
require 'admin/assets/inc/class/usermanager.class.php';
    session_start();
if (!isset($_SESSION['user']) OR $_SESSION['allowed'] != '0li') {
    header('Location: index.php');
}
?><!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Profil">
    <meta name="author" content="Odyssea">

    <title>Gui Moves</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="css/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="css/favicon/favicon.png" type="image/png">
    <link rel="icon" sizes="32x32" href="css/favicon/favicon-32.png" type="image/png">
    <link rel="icon" sizes="64x64" href="css/favicon/favicon-64.png" type="image/png">
    <link rel="icon" sizes="96x96" href="css/favicon/favicon-96.png" type="image/png">
    <link rel="icon" sizes="196x196" href="css/favicon/favicon-196.png" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="css/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="css/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="css/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="css/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="css/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="css/favicon/apple-touch-icon-144x144.png">
    <meta name="msapplication-TileImage" content="favicon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="index.php">
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile mx-auto mb-2" src="img/logo.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#profil">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#statistique">Statistiques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="enigme.php">Jouer</a> <!-- reprise énigme en cours -->
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">Déconnexion</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="profil">
        <div class="my-auto">
          <h1 class="mb-0"><?=$_SESSION['user']->getFirstName()?>
            <span class="text-primary"><?=$_SESSION['user']->getLastName()?></span>
          </h1>
          <div class="mb-5"><p><br><br>E-mail: <?=$_SESSION['user']->getEmail()?></p></div>
          <div class="mb-5"><a data-toggle="modal" data-target="#modal-mdp" href="">Changer de mot de passe</a></div>
          <a href="plateaupdf.pdf">Télécharger le plateau du jeu</a>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="statistique">
        <div class="my-auto">
          <h2 class="mb-5">Statistiques</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Temps de jeu</h3>
              <div class="subheading mb-3"><p><br>18 minutes et 15 secondes</p></div> <!-- affichage du temps de jeu -->
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Avancé dans le jeu</h3>
              <div class="subheading mb-3"><p><br><?php
                        if($_SESSION['user']->getEnigme() >=13) {
                            echo 'Jeu Terminé';
                        } else {
                            echo 'Enigme: '.$_SESSION['user']->getEnigme();
                        }
                      ?></p></div> <!-- affichage des énigmes fini -->
                <div class="subheading mb-3"><p><a href="enigme.php">Reprendre le jeu</a></p></div> <!-- reprender l'énigme en cours -->
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Vie restante</h3>
              <div class="subheading mb-3"><p><br>3 vies</p></div> <!-- affichage des vies restantes -->
            </div>
          </div>

        </div>

          <!-- Modal email -->
          <div class="modal fade" id="modal-adresse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabelC">Changement de mot de passe</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>

                  </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          <!-- Modal mot de passe -->
          <div class="modal fade" id="modal-mdp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabelC">Changement de mot de passe</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body">
                          <form name="sentMessage" id="contact" novalidate method="post" action ="connexion.php">
                              <div class="row">
                                  <div class=" index col-lg-12 text-center">
                                      <div class="form-group">
                                          <p class="text-black-100">Nouveau mot de passe :</p>
                                          <input type="password" class="form-control" id="password" required data-validation-required-message="Mot de passe">
                                          <p class="help-block text-danger"><br></p>
                                      </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-12 text-center">
                                      <div id="success"></div>
                                      <button type="submit" class="profil btn js-scroll-trigger passB">Envoyer</button>
                                  </div>
                              </div>
                          </form>
                          <!--           <div class="alert alert-danger">
                                        <b>Erreur!</b> Login ou Mot de passe refusé
                                      </div> -->
                      </div>
                  </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>
    <script src="js/jquery.scrollTo.min.js" type="text/javascript"></script>
    <script src="js/jquery.localScroll.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.localScroll();
        });

        $('.passB').click(function(){
            var pass = $('#password').val();

            $.post('admin/assets/form/changePass.php',{password:pass}).done(function(data){
                $('.clearfix').html(data);
                window.location.href('profil.php');
            });

            return false;
        });
    </script>

  </body>

</html>
