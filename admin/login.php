<?php include 'assets/inc/head.php';
    if (isset($_SESSION['user']) && $_SESSION['allowed'] == '0li') {
        header('Location: index.php');
    }
?>
<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form>
                    <div class="form-group">
                        <label>Adresse Email</label>
                        <input type="email" class="form-control form-login" placeholder="Email" id="loginEmail">
                    </div>
                    <div class="form-group">
                        <label>Mot de Passe</label>
                        <input type="password" class="form-control form-login" placeholder="Mot de Passe" id="loginPass">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Rester Connecté
                        </label>
                        <label class="pull-right">
                            <a href="#" id="fPass">Mot de Passe Oublié ?</a>
                        </label>
                    </div>
                    <div class="form-group" id="fPassForm" style="display: none">
                        <label>Entrez votre Mail</label>
                        <input type="email" class="form-control" placeholder="Email de Récupération" id="rmail">
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" id="rsend">Récupérer</button>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" id="logB">Connexion</button>
                    <div id="logMsg"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'assets/inc/scripts.php';?>

<script>
    $(document).ready(function(){
        $('#fPass').click(function(){
            $('#fPassForm').fadeToggle();
        });

        //Connexion
        $('#logB').click(function(){
            login();
            return false;
        });

        //Pswd Forget
        $('#rsend').click(function(){
            var mail = $('#rmail').val();
            $.post('assets/form/resetPass.php',{email:mail}).done(function(data){
                $('#logMsg').html(data);
                console.log(data);
            });
        });



        function login(){
            var email = $('#loginEmail').val();
            var pass = $('#loginPass').val();

            var logIn = $.post('assets/form/loginAccess.php', {email:email,password:pass});
            logIn.done(function(data){
                $('#logMsg').html(data);
                setTimeout(goToIndex, 3000);
            });
        }

        function checkForm() {
            var i = $('#loginEmail').val();
            var j = $('#loginPass').val();
            if (i === '' || j === '') {
                $('#logB').fadeOut();
            } else {
                $('#logB').slideDown();
            }
        }

        function goToIndex() {
            window.location.replace("index.php");
        }

        setInterval(checkForm, 100);
    });
</script>

</body>
</html>
