<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 12/11/2018
 * Time: 10:41
 */

require '../inc/class/user.class.php';
require '../inc/class/enigmemanager.class.php';

session_start();

$eMan = new enigmeManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
echo $eMan->getEnigmeInfo($_SESSION['user']->getEnigme());