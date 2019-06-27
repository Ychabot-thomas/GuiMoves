<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="jeux dynamique">
    <meta name="author" content="Odyssea">

    <title>Gui Moves</title>

    <link rel="stylesheet" href="css/styles.css">

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
            <form name="sentMessage" id="contactForm" novalidate method="post" action ="inscription.php">
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
                <div class="col-lg-12 text-center">
                  <div class="form-group">
                    <p class="text-black-100">Email :</p>
                    <input type="texte" class="form-control" id="log_email" required data-validation-required-message="Email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <p class="text-black-100">Mot de Passe :</p>
                    <input type="password" class="form-control" id="log_password" required data-validation-required-message="Mot de passe">
                    <p class="help-block text-danger"><br></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button type="submit" class="btn btn-primary js-scroll-trigger" id="log_button">Envoyer</button>
                </div>
                <div class="form-group col-lg-12 text-center">
                  <p class="text-black-100"><br><br><a href="#">Mot de Passe oublié ?</a></p>
                </div>
              </div>
            </form>
           <div id="signMsg"></div>
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

<!--    <div class="home mx-auto text-center">
      <a href="#synopsis" class="home btn btn-primary js-scroll-trigger">En savoir plus</a>
      <video controls class="home">
        <source type="video/mp4" src="video/home.mp4">
      </video>
    </div> -->

    <!-- About Section -->
    <section id="synopsis" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <p class="text-black-100">Gui est un petit lapin attachant, gentil mais un peu simplet. Un jour, il doit se confronter à Dave pour retrouver son trésor perdu et se retrouve donc malgré lui propulsé dans une quête périlleuse et mystérieuse à travers des mondes plus énigmatiques et appétissants les uns que les autres.</p>
            <div class="trio-textes">
              <p class="text-black-100">lvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,ev</p>
              <p class="text-black-100">lvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,ev</p>
              <p class="text-black-100">lvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,evlvmvrnv vonvorenmv vnopvonvvnpreomv vnrmev,ev</p>
            </div>
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

    <!-- Modal Insccription -->


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
                var email = $('#add_email').val();
                var password = $('#add_password').val();

                $.post('admin/assets/form/signin.php',{email:email,password:password}).done(function(data){
                    $('#logMsg').html(data);
                    setTimeout(window.location.replace('profil.php'),3000);
                });

                return false;
            });

            function refreshPage() {
                window.location.replace("index.php");
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
