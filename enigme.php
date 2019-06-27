<?php
require 'admin/assets/inc/class/user.class.php';
session_start();
if (!isset($_SESSION['user']) OR $_SESSION['allowed'] != '0li') {
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

    <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>


</head>
<body class="enigme" id="page-top">

    <?php
        if ($_SESSION['user']->getRank() == 'Banni') {
            header('Location: profil.php');
        } else {
            //
            if ($_SESSION['user']->getEnigme() >= 13) {
                echo '<h2 class="text-center">Vous avez fini le jeu</h2>';
            } else {
                header('Location: jeu/'.$_SESSION['user']->getEnigme().'.html');
            }
        }
    ?>

<script>
    $(document).ready(function(){
        function gotohell() {
            window.location.replace('profil.php');
        }

        setTimeout(gotohell, 2000);
    });
</script>
</body>

</html>
