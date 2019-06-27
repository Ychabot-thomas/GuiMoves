<?php
    require '../inc/class/user.class.php';
    require '../inc/class/usermanager.class.php';

    $uManager = new userManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
    echo $uManager->getUsers(false,'user_id',$_POST['uid']);