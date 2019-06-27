<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 12/11/2018
 * Time: 12:28
 */

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';

session_start();

$uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
$uManager->banUser($_SESSION['user']);
