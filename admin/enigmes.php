<?php include 'assets/inc/head.php';
    require 'assets/inc/class/enigme.class.php';
    require 'assets/inc/class/enigmemanager.class.php';
?>
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
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Énigmes</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Contenu</th>
                                    <th>Passcode</th>
                                    <th>Nb Essais avant le Ban</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $uManager = new enigmeManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');

                                echo $uManager->getEnigmes();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="content mt-3 animated fadeIn">
        <div class="row">
            <!-- ADD ENIGME -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter</strong> une Énigme
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_name" class=" form-control-label">Nom</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="add_name" name="add_name" placeholder="Nom" class="form-control add-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Contenu</label></div>
                                <div class="col-12 col-md-9"><textarea name="add_content" id="add_content" placeholder="HTML" class="form-control add-form-reset"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_passcode" class=" form-control-label">Pass Code</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="add_passcode" name="add_passcode" placeholder="Mot de Passe" class="form-control add-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_attempt" class=" form-control-label">Nombre d'Essais</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="add_attempt" name="add_attempt" placeholder="Essais" class="form-control add-form-reset"></div>
                            </div>
                        </form>
                    </div>
                    <div id="addMsg"></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="addB">
                            <i class="fa fa-dot-circle-o"></i> Ajouter
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" id="addResetButton">
                            <i class="fa fa-ban"></i> Vider les Champs
                        </button>
                    </div>
                </div>
            </div>

            <!-- UPDATE ENIGME -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Modifier</strong> une Énigme
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="up_id" id="up_id" value="1337">
                            <input type="hidden" name="up_total" id="up_total" value="1337">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_name" class=" form-control-label">Nom</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="up_name" name="up_name" placeholder="Nom" class="form-control up-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_content" class=" form-control-label">Contenu</label></div>
                                <div class="col-12 col-md-9"><textarea name="up_content" id="up_content" placeholder="HTML" class="form-control up-form-reset"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_passcode" class=" form-control-label">Pass Code</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="up_passcode" name="up_passcode" placeholder="Mot de Passe" class="form-control up-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_attempt" class=" form-control-label">Nombre d'Essais</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="up_attempt" name="up_attempt" placeholder="Essais" class="form-control up-form-reset"></div>
                            </div>
                        </form>
                    </div>
                    <div id="upMsg"></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="upB">
                            <i class="fa fa-dot-circle-o"></i> Modifier
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" id="upResetButton">
                            <i class="fa fa-ban"></i> Vider les Champs
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'assets/inc/scripts.php';?>


<script type="text/javascript">
    $(document).ready(function() {
        //$('#bootstrap-data-table-export').DataTable();
        //getEnigmes();

        $('#addResetButton').click(function(){
            $('.add-form-reset').val('');
        })
        $('#upResetButton').click(function(){
            $('.up-form-reset').val('');
        })

        $('#addB').click(function(){
            var nom = $('#add_name').val();
            var content = $('#add_content').val();
            var passcode = $('#add_passcode').val();
            var attempt = $('#add_attempt').val();

            $.post('assets/form/addEnigme.php',{name:nom,content:content,passcode:passcode,attempt:attempt}).done(function(data){
                $('#addMsg').html(data);
                setTimeout(refreshPage, 3000);
            });
        });

        $('.btn-update').click(function(){
            var id = $(this).attr('data-e-id');
            $.post('assets/form/getEnigmeInfo.php',{id:id}).done(function(data){
                data = JSON.parse(data);
                console.log(data);
                $('#up_id').val(data['enigme_id']);
                $('#up_name').val(data['enigme_name']);
                $('#up_content').val(data['enigme_content']);
                $('#up_passcode').val(data['enigme_code']);
                $('#up_attempt').val(data['enigme_attempt_to_fail']);
                $('#up_total').val(data['enigme_total_attempt']);
            });
        });

        $('#upB').click(function(){
            var id = $('#up_id').val();
            var name = $('#up_name').val();
            var content = $('#up_content').val();
            var code = $('#up_passcode').val();
            var attempt = $('#up_attempt').val();
            var total = $('#up_total').val();

            $.post('assets/form/updateEnigme.php',{id:id,name:name,content:content,code:code,attempt:attempt,total:total}).done(function(data){
                $('#upMsg').html(data);
                setTimeout(refreshPage, 3000);
            });
        });

        $('.btn-delete').click(function(){
            var id = $(this).attr('data-e-id');
            $.post('assets/form/deleteEnigme.php',{id:id});
            refreshPage();
        });

        function getEnigmes() {
            $.post('assets/form/getEnigmes.php').done(function(data){
                $('tbody').html(data);
            });
        }

        function refreshPage() {
            window.location.replace("enigmes.php");
        }


    } );
</script>

</body>
</html>
