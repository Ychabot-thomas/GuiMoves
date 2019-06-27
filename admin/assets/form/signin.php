<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 12/11/2018
 * Time: 09:38
 */

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';

session_start();

$uMan = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
if($c = $uMan->loginAttempt($_POST['email'],$_POST['password'])) {

    echo $c;
} else {
    echo $c;
}