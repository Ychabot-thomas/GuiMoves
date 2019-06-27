<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 07/11/2018
 * Time: 23:44
 */

session_start();
session_unset();
session_destroy();

header('Location: index.php');