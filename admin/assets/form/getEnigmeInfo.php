<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 11/11/2018
 * Time: 16:45
 */

require '../inc/class/enigmemanager.class.php';
$id = $_POST['id'];
$eMan = new enigmeManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
echo $eMan->getEnigmeInfo($id);