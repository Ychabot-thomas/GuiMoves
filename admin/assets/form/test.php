<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="jeux dynamique">
    <meta name="author" content="Odyssea">

    <title>Gui Moves</title>

    <link rel="stylesheet" href="../../../css/styles.css"><!--
    <link rel="shortcut icon" href="../css/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../css/favicon/favicon.png" type="image/png">
    <link rel="icon" sizes="32x32" href="../css/favicon/favicon-32.png" type="image/png">
    <link rel="icon" sizes="64x64" href="../css/favicon/favicon-64.png" type="image/png">
    <link rel="icon" sizes="96x96" href="../css/favicon/favicon-96.png" type="image/png">
    <link rel="icon" sizes="196x196" href="../css/favicon/favicon-196.png" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="../css/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../css/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../css/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../css/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../css/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../css/favicon/apple-touch-icon-144x144.png">
    <meta name="msapplication-TileImage" content="favicon-144.png">-->
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <!-- Bootstrap core CSS -->
    <link href="../../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../css/grayscale.min.css" rel="stylesheet">


</head>

<body class="enigme" id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a id="liena" class="navbar-brand js-scroll-trigger">Gui Moves</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="lienb" class="nav-link js-scroll-trigger" href="../../../profil.php">Mon Profil</a>
                </li>
                <li class="nav-item">
                    <a id="liend" class="nav-link js-scroll-trigger" href="../../../logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="jeu">
    <div id="animation">
        <video id="enigme" controls>
            <source src="../../../video/enigme/enigme_1.mp4" type="video/mp4">
            <source src="../../../video/enigme/enigme_1.ogv" type="video/ogg">
        </video>
        <img id="photo_enigme" src="../../../img/enigme/enigme1.jpg" alt="monde 1">
    </div>
    <div id="reponse">
        <div class="col-lg-12 text-center">
            <p class="enigme text-center">Les dés ne servent pas qu'à avancer</p>
            <input type="text" class="enigme form-control reponse">
            <a href="#" class="enigme btn btn-primary js-scroll-trigger rep">Valider la réponse</a>
            <!-- direction vers l'énigme suivante <a> -->
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="size bg-black small text-center text-black-100">
    <div class="container">
        Copyright © Gui Moves 2018
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../../../vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<!-- Plugin JavaScript -->
<script src="../../../vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

<!-- Custom scripts for this template -->
<script src="../../../js/grayscale.min.js" type="text/javascript"></script>

<?php

require '../inc/class/user.class.php';
require '../inc/class/enigmemanager.class.php';
session_start();
print_r($_SESSION);

enigmeManager::upPlay($_SESSION['user']->getId(),$_SESSION['user']->getEnigme(),300,2);
?>

<script type="text/javascript">
    document.getElementById('enigme').addEventListener('ended',myHandler,false);
    function myHandler() {
        document.getElementById('enigme').style.display="none";
        document.getElementById('reponse').style.display="block";
        document.getElementById('photo_enigme').style.display="block";
    }
    $(document).ready(function(){
        checkLn();
        var donnees = getEnigme();
        var attempt = 0;
        var code = '';
        var max = 3;
        var id = 0;


        $('.rep').click(function(){
            var r = no_accent($(this).parent().find('.reponse').val());
            r = r.toLowerCase();
            if (r === code) {
                var time = 300;
                $.post('enigmePlus.php',{time:time,attempt:attempt}).done(function(data){
                    var v = parseInt(id)+1;
                    window.location.replace(v+'.html');
                });
            } else {
                attempt += 1;
                $.post('addAttempt.php',{a:attempt});
                if (attempt >= max) {
                    $.post('banUser.php').done(function(){
                        window.location.replace('../profil.php');
                    });
                }
            }
        });

        function getEnigme() {
            $.post('getEnigmeForPlayer.php').done(function(data){
                data = JSON.parse(data);
                console.log(data);
                id = data['enigme_id'];
                code = no_accent(data['enigme_code'].toLowerCase());
                max = data['enigme_attempt_to_fail'];
                return data;
            });
        }

        function no_accent(my_string) {
            return my_string.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
        }

        function checkLn() {
            $.post('checkIfUserLogin.php').done(function(data){
                if (data === 'away') {
                    window.location.replace('https://guimoves.oliviso.fr');
                }
            });

        }
    });
</script>

</body>

</html>
