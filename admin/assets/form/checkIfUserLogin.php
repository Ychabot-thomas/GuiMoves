<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 13/11/2018
 * Time: 15:50
 */

require '../inc/class/usermanager.class.php';
require '../inc/class/user.class.php';
$u = userManager::checkIfUserLogin();
$page = 'https://guimoves.oliviso.fr/jeu/'.$_SESSION['user']->getEnigme().'.html';
if ($u == 'away') {
    echo 'away';
}/* elseif ($_SESSION['user']->getEnigme != $_POST['page']) {
    echo 'away';
}*/