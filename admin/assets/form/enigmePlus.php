<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 12/11/2018
 * Time: 11:57
 */

require '../inc/class/user.class.php';
require '../inc/class/usermanager.class.php';
require '../inc/class/enigmemanager.class.php';
session_start();

enigmeManager::upPlay($_SESSION['user']->getId(),$_SESSION['user']->getEnigme()+1,$_POST['time'],$_POST['attempt']);
enigmeManager::addPlay($_SESSION['user']->getId(),$_SESSION['user']->getEnigme()+1);
$uMan = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
$_SESSION['user']->setEnigme($_SESSION['user']->getEnigme()+1);
$_SESSION['user']->setPassword($_SESSION['user']->getPassword);
$uMan->updateUser($_SESSION['user']);	