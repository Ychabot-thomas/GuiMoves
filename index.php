<?php
    require 'admin/assets/inc/class/user.class.php';
    require 'admin/assets/inc/class/usermanager.class.php';
    session_start();


    if (isset($_SESSION['user']) && $_SESSION['allowed'] == '0li') {
        header('Location: profil.php');
    }
?><!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="jeux dynamique">
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Gui Moves</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modal-inscription" href="">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modal-connexion" href="">Connexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Modal Inscription -->
    <div class="modal fade" id="modal-inscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabelI">Inscription</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <form name="sentMessage" id="Inscription" novalidate method="post" action ="inscription.php">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <div class="form-group">
                    <p class="text-black-100">Nom :</p>
                    <input type="text" class="form-control" id="add_nom" required data-validation-required-message="nom">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <p class="text-black-100">Prénom :</p>
                    <input type="text" class="form-control" id="add_prenom" required data-validation-required-message="prenom">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <p class="text-black-100">Email :</p>
                    <input type="text" class="form-control" id="add_email" required data-validation-required-message="email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <p class="text-black-100">Mot de Passe :</p>
                    <input type="password" class="form-control" id="add_password" required data-validation-required-message="Mot de passe">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button type="submit" class="btn btn-primary js-scroll-trigger" id="add_button">Envoyer</button>
                </div>
              </div>
            </form>
            <div id="signupMsg"></div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Connexion -->
    <div class="modal fade" id="modal-connexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabelC">Connexion</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <form name="sentMessage" id="contact" novalidate method="post" action ="connexion.php">
              <div class="row">
                <div class=" index col-lg-12 text-center">
                  <div class="form-group">
                    <p class="text-black-100">Email :</p>
                    <input type="text" class="form-control" id="email" required data-validation-required-message="Email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <p class="text-black-100">Mot de Passe :</p>
                    <input type="password" class="form-control" id="password" required data-validation-required-message="Mot de passe">
                    <p class="help-block text-danger"><br></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                    <button type="submit" class="btn btn-primary js-scroll-trigger" id="log_button">Envoyer</button>
                  </div>
                </div>
                <div class="index form-group col-lg-12 text-center">
                  <p class="text-black-100"><br><br><a data-toggle="modal" data-target="#modal-mdp-oublie" href="">Mot de passe oublié ?</a></p>
                </div>
              </div>
            </form>
          <div id="logMsg"></div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal Mot de passe oublié -->
    <div class="modal fade" id="modal-mdp-oublie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabelI">Mot de passe oublié :</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <form name="sentMessage" id="contactForm" novalidate method="post" action ="">
              <div class="row">
                <div class="index col-lg-12 text-center">
                  <div class="form-group">
                    <p class="text-black-100">Email :</p>
                    <input type="text" class="form-control" id="vemail" required data-validation-required-message="vemail">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button type="submit" class="index btn btn-primary js-scroll-trigger" id="vb">Envoyer</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Header -->

    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <img class="logo" src="img/logo.png" alt="logo"><br><br>
          <a href="#synopsis" class="btn btn-primary js-scroll-trigger">En savoir plus</a>
        </div>
      </div>
    </header>


    <!-- About Section -->
    <section id="synopsis" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <p class="text-black-100">Gui est un petit lapin attachant, gentil mais un peu simplet. Un jour, il doit se confronter à Dave pour retrouver son trésor perdu et se retrouve donc malgré lui propulsé dans une quête périlleuse et mystérieuse à travers des mondes plus énigmatiques et appétissants les uns que les autres.</p>
            <div class="trio-textes">
                <img class="index" src="img/lapin.png" alt="Gui">
                <p class="text-black-100">Tout d’abord, il est nécessaire de vous inscrire et/ou vous connecter pour jouer au jeu. Une fois votre inscription faite, vous trouverez un email de d’activation dans votre boîte mail. Vous pourrez alors commencer à jouer.</p>
                <p class="text-black-100">Le jeu traduit la quête du personnage et consiste en la résolution d’une série d’énigmes. Il est obligatoire de résoudre l’énigme pour accéder à la suivante. Vous entrerez votre réponse dans le champ prévu à cet effet en minuscule ; les accents ne sont pas pris en compte.</p>
                <p class="text-black-100">Au bout de 3 échecs, le joueur ne pourra plus accéder au jeu pour une durée d’une heure. Au terme de cette heure, le joueur pourra reprendre sa progression là où il l’avait arrêté.</p>
                <p class="text-black-100">Pour répondre aux énigmes il est nécessaire de posséder le plateau de jeu. En effet, tous les indices permettant de répondre à celles-ci se trouvent sur le plateau. Ouvrez l’œil !</p>
                <p class="text-black-100">A la fin de votre partie, le jeu vous affichera votre classement selon votre temps de jeu et vos réponses erronées. Vous pourrez alors vous rendre compte de votre performance et tenter de l’améliorer.</p>
                <p class="text-black-100">Bonne chance</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="size bg-black small text-center text-black-100">
      <div class="container">
        Copyright © Gui Moves 2018
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#myBtn").click(function(){
                $("#panel").slideDown("slow");
            });

            $('#add_button').click(function(){
                var nom = $('#add_nom').val();
                var prenom = $('#add_prenom').val();
                var email = $('#add_email').val();
                var password = $('#add_password').val();

                $.post('admin/assets/form/signup.php',{lname:nom,fname:prenom,email:email,password:password}).done(function(data){
                    $('#signupMsg').html(data);
                    setTimeout(refreshPage,3000);
                });

                return false;
            });

            $('#log_button').click(function(){
                var email = $('#email').val();
                var password = $('#password').val();

                $.post('admin/assets/form/signin.php',{email:email,password:password}).done(function(data){
                    $('#logMsg').html(data);
                    setTimeout(successPage,3000);
                });

                return false;
            });

            function refreshPage() {
                window.location.replace("index.php");
            }

            $('#vb').click(function(){
                var p = $('#vemail').val();

                $.post('admin/assets/form/resetPass.php',{email:p}).done(function(data){
                    window.location.href = 'index.php';
                });

                return false;
            })

            function successPage() {
                window.location.replace('profil.php');
            }
        });
    </script>

<!--    <script>
        $(function(){
            $("#contact").submit(function(event){
                var nom        = $("#nom").val();
                var sujet      = $("#sujet").val();
                var email      = $("#email").val();
                var message    = $("#message").val();
                var dataString = nom + sujet + email + message;
                var msg_all    = "Merci de remplir tous les champs";
                var msg_alert  = "Merci de remplir ce champs";

                if (dataString  == "") {
                    $("#msg_all").html(msg_all);
                } else if (nom == "") {
                    $("#msg_nom").html(msg_alert);
                } else if (sujet == "") {
                    $("#msg_sujet").html(msg_alert);
                } else if (email == "") {
                    $("#msg_email").html(msg_alert);
                } else if (message == "") {
                    $("#msg_message").html(msg_alert);
                } else {
                    $.ajax({
                        type : "POST",
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success : function() {
                            $("#contact").html("<p>Formulaire bien envoyé</p>");
                        },
                        error: function() {
                            $("#contact").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
                        }
                    });
                }

                return false;
            });
        });
    </script> -->


  </body>

</html>