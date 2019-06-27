<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 11/11/2018
 * Time: 16:33
 */

require '../inc/class/enigmemanager.class.php';

$eMan = new enigmeManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
echo $eMan->getEnigmes();