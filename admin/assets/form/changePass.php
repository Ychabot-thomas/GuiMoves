<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 07/11/2018
 * Time: 16:51
 */

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';

session_start();

$_SESSION['user']->setPassword($_POST['password']);
$uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
if($_SESSION['user'] = $uManager->updateUser($_SESSION['user'])){
    echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                Votre Mot de Passe a bien été Modifié !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
} else {
    echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Erreur
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
}