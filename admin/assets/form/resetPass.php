<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 08/11/2018
 * Time: 09:51
 */

    require '../inc/class/user.class.php';
    require '../inc/class/usermanager.class.php';

    $email = htmlspecialchars($_POST['email']);

    $host = 'http://guimoves.oliviso.fr/admin/reset.php?key='.User::securePassword($email);  //https://guimoves.oliviso.fr/reset.php?key=

    $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
    if($uManager->resetPasswordMail($email)){
        return '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                Un mail vous a été envoyé, rendez vous sur le lien pour reset votre mot de passe !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    } else {
        return '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                Votre adresse e-mail n\'a pas été reconnue.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
    }

