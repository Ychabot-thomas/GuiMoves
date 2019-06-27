<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 07/11/2018
 * Time: 16:51
 */

    require '../inc/class/user.class.php';
    require '../inc/class/usermanager.class.php';

    $user = new User($_POST['lname'],$_POST['fname'],$_POST['email'],$_POST['password'], $_POST['enigme'], $_POST['rank'], $_POST['temp_ban']);
    $user->setId($_POST['id']);
    $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
    if($uManager->toggleBanUser($user,-1)){
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                '.$user->getFirstName().' '.$user->getLastName().' a bien été (dé)banni !
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