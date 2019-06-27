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
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Utilisateurs</strong>
                        </div>
                        <div class="card-body">
                            <table id="userTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Enigme Actuelle</th>
                                    <th>Rank</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                   $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');

                                    echo $uManager->getUsers();
                                ?>
                                </tbody>
                            </table>
                            <div id="deleteMessage"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="content mt-3 animated fadeIn">
        <div class="row">
            <!-- ADD USER -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter</strong> un Utilisateur
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_lname" class=" form-control-label">Nom</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="add_lname" name="add_lname" placeholder="Nom" class="form-control add-form-reset" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_fname" class=" form-control-label">Prénom</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="add_fname" name="add_fname" placeholder="Prénom" class="form-control add-form-reset" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_email" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="add_email" name="add_email" placeholder="Email" class="form-control add-form-reset" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_password" class=" form-control-label">Mot de Passe</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="add_password" name="add_password" placeholder="Mot de Passe" class="form-control add-form-reset" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="add_rank" class=" form-control-label">Rang</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="add_rank" id="add_rank" class="form-control">
                                        <option value="Newbie">Newbie</option>
                                        <option value="Utilisateur" selected>Utilisateur</option>
                                        <option value="Banni">Banni</option>
                                        <option value="Administrateur">Administrateur</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div id="addMessage"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="addUser">
                            <i class="fa fa-dot-circle-o"></i> Ajouter
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm" id="addResetButton">
                            <i class="fa fa-ban"></i> Vider les Champs
                        </button>
                    </div>
                </div>
            </div>

            <!-- UPDATE USER -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Modifier</strong> un Utilisateur
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" id="up_id" name="up_id" class="up-form-reset" value="1">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_lname" class=" form-control-label">Nom</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="up_lname" name="up_lname" placeholder="Nom" class="form-control up-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_fname" class=" form-control-label">Prénom</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="up_fname" name="up_fname" placeholder="Prénom" class="form-control up-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_email" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="up_email" name="up_email" placeholder="Email" class="form-control up-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_password" class=" form-control-label">Mot de Passe</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="up_password" name="up_password" placeholder="Laisser Vide pour ne pas Modifier" class="form-control up-form-reset"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_rank" class=" form-control-label">Rang</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="up_rank" id="up_rank" class="form-control">
                                        <option value="Newbie">Newbie</option>
                                        <option value="Utilisateur">Utilisateur</option>
                                        <option value="Banni">Banni</option>
                                        <option value="Administrateur">Administrateur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="up_enigme" class=" form-control-label">Énigme</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="up_enigme" name="up_enigme" placeholder="Énigme" class="form-control up-form-reset"></div>
                            </div>
                            <input type="hidden" value="" class="up-form-reset" id="up_temp_ban">
                        </form>
                        <div id="upMessage"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="upUser">
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
        //Pour que la table soit initialisée
        //$('#userTable').DataTable();
        // Récup Users
        //getUsers();

        // Clicks
        /*Reset des Forms*/
        $('#addResetButton').click(function(){
            $('.add-form-reset').val('');
        });
        $('#upResetButton').click(function(){
            $('.up-form-reset').val('');
        });
        /*Fin Reset des Forms*/

        /* Ajouter Utilisateur*/
        $('#addUser').click(function(){
            addUser();
        });

        /* Modifier un Utilisateur */
        // [Liste]
        $('.btn-update').click(function(){
            var uid = $(this).attr('data-user-id');
            upUserx(uid);
        });
        // [Formulaire]
        $('#upUser').click(function(){
            upUserz();
        });

        /* Supprimer un Utilisateur */
        $('.btn-delete').click(function(){
            var did = $(this).attr('data-user-id');
            deleteUser(did);
        });

        /* toggleBan Utilisateur */
        $('.btn-ban').click(function(){
            var bid = $(this).attr('data-user-id');
            toggleBanUser(bid);
        });

        //Functions
        function getUsers() {
            $.post('assets/form/getUsers.php').done(function(getUsersData){
                $('tbody').html(getUsersData);
            });
        }

        //Ajouter Utilisateur
        function addUser(){
            var add_lname = $('#add_lname').val();
            var add_fname = $('#add_fname').val();
            var add_email = $('#add_email').val();
            var add_password = $('#add_password').val();
            var add_rank = $('#add_rank').val();
            console.log(add_rank);
            $.post('assets/form/addUser.php',{lname:add_lname,fname:add_fname,email:add_email,password:add_password,rank:add_rank})
                .done(function(data){
                    $('#addMessage').html(data);
                    $('.add-form-reset').val('');
                    setTimeout(refreshPage, 3000);
                });
            // SUCCESS : REFRESH LISTE USERS
        }

        /*Modifier Utilisateur*/
        //[Liste]
        function upUserx(id) {
            var getUserInfo = $.post('assets/form/getUserInfo.php', {uid:id});
            getUserInfo.done(function(data){
                var data = JSON.parse(data);
                $('#up_id').val(data['user_id']);
                $('#up_lname').val(data['user_lname']);
                $('#up_fname').val(data['user_fname']);
                $('#up_email').val(data['user_email']);
                $('#up_rank').val(data['user_rank']);
                $('#up_enigme').val(data['user_enigme']);
                $('#up_temp_ban').val(data['user_temp_ban']);
            });
        }
        //[Formulaire]
        function upUserz() {
            var up_id = $('#up_id').val();
            var up_lname = $('#up_lname').val();
            var up_fname = $('#up_fname').val();
            var up_email = $('#up_email').val();
            var up_password = $('#up_password').val();
            var up_rank = $('#up_rank').val();
            var up_enigme = $('#up_enigme').val();
            var up_temp_ban = $('#up_temp_ban').val();

            var updateUser = $.post('assets/form/updateUser.php', {id: up_id, lname: up_lname, fname: up_fname, email: up_email, password: up_password, rank: up_rank, enigme: up_enigme, temp_ban: up_temp_ban});
            updateUser.done(function(donnees){
                $('#upMessage').html(donnees);
                $('.up-form-reset').val();
                setTimeout(refreshPage, 3000);
            });
        }

        /* Supprimer Utilisateur */
        function deleteUser(did) {
            var delete_id = did;

            var getUserInfo = $.post('assets/form/getUserInfo.php', {uid:did});
            getUserInfo.done(function(data){
                data = JSON.parse(data);
                var delete_id = data['user_id'];
                var delete_lname= data['user_lname'];
                var delete_fname = data['user_fname'];
                var delete_email = data['user_email'];
                var delete_password = data['user_password'];
                var delete_rank = data['user_rank'];
                var delete_enigme = data['user_enigme'];
                var deleteUser = $.post('assets/form/deleteUser.php', {id: delete_id, lname: delete_lname, fname: delete_fname, email: delete_email, password: delete_password, rank: delete_rank, enigme: delete_enigme});
                deleteUser.done(function(deleteData){
                    $('#deleteMessage').html(deleteData);
                    setTimeout(refreshPage, 3000);
                });
            });

        }

        /* Toggle un Ban */
        function toggleBanUser(bid) {
            var getUserInfo = $.post('assets/form/getUserInfo.php', {uid:bid});
            getUserInfo.done(function(data){
                data = JSON.parse(data);
                var ban_id = data['user_id'];
                var ban_lname= data['user_lname'];
                var ban_fname = data['user_fname'];
                var ban_email = data['user_email'];
                var ban_password = data['user_password'];
                var ban_rank = data['user_rank'];
                var ban_enigme = data['user_enigme'];
                var ban_temp_ban = data['user_temp_ban'];
                var banUser = $.post('assets/form/unbanUser.php', {id: ban_id, lname: ban_lname, fname: ban_fname, email: ban_email, password: ban_password, rank: ban_rank, enigme: ban_enigme, temp_ban: ban_temp_ban});
                banUser.done(function(banData){
                    $('#deleteMessage').html(banData);
                    setTimeout(refreshPage, 3000);
                });
            });
        }

        //Check les Champs Ajouter Utilisateur
        function checkAdd(){
            var nom = $('#add_lname').val();
            var pnom = $('#add_fname').val();
            var email = $('#add_email').val();
            var pass = $('#add_password').val();
            if (nom != '' & pnom != '' & email != '' & pass != '') {
                $('#addUser').fadeIn();
            } else {
                $('#addUser').css('display','none');
            }
        }

        //Check les Champs Modifier Utilisateur
        function checkUp(){
            var nom = $('#up_lname').val();
            var pnom = $('#up_fname').val();
            var email = $('#up_email').val();
            var en = $('#up_enigme').val();
            if (nom != '' & pnom != '' & email != '' & en != '') {
                $('#upUser').fadeIn();
            } else {
                $('#upUser').css('display','none');
            }
        }

        function refreshPage() {
            window.location.replace("users.php");
        }

        //setInterval(getUsers, 1000);
        setInterval(checkAdd,1000);
        setInterval(checkUp,1000);

    } );
</script>

</body>
</html>
