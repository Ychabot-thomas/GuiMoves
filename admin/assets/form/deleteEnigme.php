<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 11/11/2018
 * Time: 17:24
 */

require '../inc/class/enigmemanager.class.php';

$eMan = new enigmeManager('localhost','odyssea_guimoves','gui','7Jcmm6?9');
if ($eMan->deleteEnigme($_POST['id'])) {
    echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                L\'énigme a bien été supprimée !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
} else {
    echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Missing Arguments
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
}