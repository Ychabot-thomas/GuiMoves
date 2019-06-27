<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 11/11/2018
 * Time: 16:06
 */

require '../inc/class/enigme.class.php';
require '../inc/class/enigmemanager.class.php';

$enigme = new Enigme($_POST['name'],$_POST['content'],$_POST['passcode'],$_POST['attempt'],0);
$eMananger = new enigmeManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
if($enigme = $eMananger->addEnigme($enigme)) {
    $r = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                '.$enigme->getName().' a bien été ajoutée aux énigmes !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
} else {
    $r = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Missing Arguments
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
}

echo $r;