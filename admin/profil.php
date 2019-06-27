<?php include 'assets/inc/head.php';?>
<body>


<!-- Left Panel -->

<?php include 'assets/inc/nav.php';?>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'assets/inc/header.php'; ?>
    <!-- Header-->



    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <h1><?=$_SESSION['user']->getFirstName()?> <?=$_SESSION['user']->getLastName()?><span class="badge badge-danger"><?=$_SESSION['user']->getRank()?></span></h1>
                </div>
                <div class="col-md-6">
                    <h3><?=$_SESSION['user']->getEmail()?></h3>
                </div>
                <div class="col-md-6">
                    <h3><span class="font-weight-bold">Enigme:</span> <?=$_SESSION['user']->getEnigme()?></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Modifier</strong> un Mot de Passe
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="up_pass" class=" form-control-label">Nouveau Mot de Pase</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon button showPass"><i class="fa fa-eye"></i></div>
                                            <input type="password" id="up_pass" name="up_pass" placeholder="******" class="form-control up-form-reset"></div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="repeat_pass" class=" form-control-label">Répéter Mot de Passe</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon button showPass"><i class="fa fa-eye"></i></div>
                                            <input type="password" id="repeat_pass" name="repeat_pass" placeholder="******" class="form-control up-form-reset">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" id="chng">
                                <i class="fa fa-dot-circle-o"></i> Modifier
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" id="upResetButton">
                                <i class="fa fa-ban"></i> Vider les Champs
                            </button>
                        </div>
                        <div id="changePass"></div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'assets/inc/scripts.php';?>
<script>
    $(document).ready(function(){
        $('button[type=submit]').fadeOut();

        $('#chng').click(function(){
            changePass();
        });


        function checkPass() {
            var pass = $('#up_pass').val();
            var pass2 = $('#repeat_pass').val();
            
            if (pass === pass2) {
                $('button[type=submit]').fadeIn();
            } else {
                $('button[type=submit]').css('display','none');
            }
        }

        $('#addResetButton').click(function(){
            $('.add-form-reset').val('');
        })
        $('#upResetButton').click(function(){
            $('.up-form-reset').val('');
        })

        $('.showPass').click(function(){
            var type = $(this).parent().children('input').attr('type');
            if (type === 'password') {
                $(this).parent().children('input').attr('type', 'text');
            } else {
                $(this).parent().children('input').attr('type', 'password');
            }
        });

        //Changer Mdp
        function changePass() {
            var pass = $('#up_pass').val();

            var changePass = $.post('assets/form/changePass.php',{password:pass});
            changePass.done(function(data){
                $('.up-form-reset').val('');
                $('#changePass').html(data);
                setTimeout(refreshPage, 3000)
            });
        }

        function refreshPage() {
            window.location.replace("profil.php"); // A MODIFIER
        }
        setInterval(checkPass, 100);
    });
</script>

</body>
</html>
