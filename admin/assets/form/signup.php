<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 12/11/2018
 * Time: 09:26
 */

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';

$user = new User($_POST['lname'],$_POST['fname'],$_POST['email'],$_POST['password'],0,'Utilisateur',NULL);
$uMan = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
if($uMan->addUser($user)) {
    echo '<div class="alert alert-success">
                                  <b>Félicitation!</b> Votre compte a bien été enregistré, veuillez vérifier votre messagerie
                                </div>';
    userManager::sendMail($user->getEmail(),'Vous venez de vous inscrire sur guimoves.oliviso.fr','Inscription Guimoves');

} else {
    echo '<div class="alert alert-danger">
                                  <b>Erreur</b> Il y a un soucis, pensez à vérifier vos informations.
                                </div>';
}

