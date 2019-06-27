<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 07/11/2018
 * Time: 14:25
 */

    require '../inc/class/user.class.php';
    require '../inc/class/usermanager.class.php';

    if (isset($_POST) && !empty($_POST)) {
        $user = new User($_POST['lname'],$_POST['fname'],$_POST['email'],$_POST['password'], $_POST['enigme'], $_POST['rank'], $_POST['temp_ban']);
        $user->setId($_POST['id']);
        $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
        $user = $uManager->updateUser($user);

        $r = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                '.$user->getFirstName().' '.$user->getLastName().' a bien été modifié !
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

    echo $r;