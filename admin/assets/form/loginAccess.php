<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 07/11/2018
 * Time: 22:05
 */

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';

session_start();

$uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
echo $uManager->loginAdminAttempt($_POST['email'], $_POST['password']);