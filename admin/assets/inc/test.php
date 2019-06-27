<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 24/10/2018
 * Time: 14:39
 */

require 'class/user.class.php';
require  'class/usermanager.class.php';

echo intval(322/60) . ' m ' . 322%60 . ' s';

echo User::securePassword('contact@oliviso.fr');