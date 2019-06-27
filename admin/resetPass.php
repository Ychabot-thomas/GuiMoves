<?php include 'assets/inc/head.php';
    session_unset();
    session_destroy();
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
                        <label>Mot de Passe</label>
                        <input type="hidden" value="<?=$_GET['key']?>" id="upKey">
                        <input type="password" class="form-control form-login" placeholder="Mot de Passe" id="upPass">
                    </div>

                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" id="upB">Changer Mot de Passe</button>
                    <div id="logMsg"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'assets/inc/scripts.php';?>

<script>
    $(document).ready(function(){
        $('#upB').click(function(){
            var key = $('#upKey').val();
            var p = $('#upPass').val();

            $.post('assets/form/resetPassKey.php',{key:key,password:p}).done(function(data){
                $('#logMsg').html(data);
                window.location.href = 'login.php';
            });

            return false;
        })
    });
</script>

</body>
</html>
