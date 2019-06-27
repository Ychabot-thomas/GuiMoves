<?php

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';

if (isset($_POST) && !empty($_POST)) {
    $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
    $ui = $uManager->resetPasswordWithKey($_POST['key'], $_POST['password']);

    if ($ui != false) {
        $r = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                Mot de Passe modifié !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    } else {
        $r = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Missing Arguments
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    }
}
echo $r;