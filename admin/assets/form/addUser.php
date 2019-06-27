<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 05/11/2018
 * Time: 20:13
 */

    require '../inc/class/user.class.php';
    require '../inc/class/usermanager.class.php';

    if (empty($_POST) OR !isset($_POST)) {
        $r = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Missing Arguments
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    } else {
        $user = new User(htmlspecialchars($_POST['lname']),htmlspecialchars($_POST['fname']),htmlspecialchars($_POST['email']),$_POST['password'], 1, $_POST['rank'], NULL);
        $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
        $user = $uManager->addUser($user);

        $r = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                '.$user->getFirstName().' '.$user->getLastName().' a bien été ajouté aux utilisateurs !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    }

    echo $r;