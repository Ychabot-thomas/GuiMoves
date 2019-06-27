<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 06/11/2018
 * Time: 09:37
 */

    require '../inc/class/usermanager.class.php';

    $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');

    echo $uManager->getUsers();