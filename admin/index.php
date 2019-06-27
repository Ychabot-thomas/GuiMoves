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

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Bienvenue</div>
                                <div class="stat-digit"><?=$_SESSION['user']->getFirstName()?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Utilisateurs</div>
                                <div class="stat-digit"><?php
                                        $uM = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
                                        $b = $uM->getDb()->query('SELECT COUNT(*) FROM gui_users');
                                        echo $b->fetch()[0];
                                    ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Nombre d'Épreuves</div>
                                <div class="stat-digit"><?php
                                    $uM = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
                                    $b = $uM->getDb()->query('SELECT COUNT(*) FROM gui_enigmes');
                                    echo $b->fetch()[0];
                                    ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- .content -->
<?php /*
        <div class="content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <strong class="card-title text-light">LiveChat</strong>
                            </div>
                            <div class="card-body text-white bg-danger">
                                <p class="card-text text-light">Admin Olivier : Coucou</p>
                            </div>
                            <div class="card-body text-white bg_secondary">
                                <p class="card-text text-dark">Elsa : Salut Oli !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 pb-3">
                        <input type="text" id="text-input" name="text-input" placeholder="Message" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-dot-circle-o"></i> Envoyer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#right-panel -->
    <!-- Right Panel --> */ ?>

    <?php include 'assets/inc/scripts.php';?>

</body>
</html>
