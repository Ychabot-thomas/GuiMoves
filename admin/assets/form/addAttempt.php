<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 13/11/2018
 * Time: 16:35
 */

require '../inc/class/user.class.php';
require '../inc/class/enigme.class.php';
require '../inc/class/enigmemanager.class.php';
require '../inc/class/usermanager.class.php';

session_start();

enigmeManager::upPlay($_SESSION['user']->getId(), $_SESSION['user']->getEnigme(),0,$_POST['a']);