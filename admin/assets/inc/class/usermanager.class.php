<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 05/11/2018
 * Time: 11:48
 */

class userManager
{
    // PROPERTIES
    protected $db;

    // CONSTRUCTOR
    public function __construct($host, $name, $user, $password)
    {
        $db = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $password);
        $this->setDb($db);
    }

    // METHODS
    public function addUser($user) {
        $lname = $user->getLastName();
        $fname = $user->getFirstName();
        $email = $user->getEmail();
        $password = User::securePassword($user->getPassword());
        $rank = $user->getRank();
        $error = false;

        //Check Email
        $checkE = $this->getDb()->query('SELECT * FROM gui_users');
        while($dataCheck = $checkE->fetch()) {
            if ($dataCheck['user_email'] == $email) {
                $returnMsg = false;
                $error = true;
            }
        }

        $addUser = $this->getDb()->prepare('INSERT INTO gui_users(user_lname, user_fname, user_email, user_password, user_rank) VALUES(:lname, :fname, :email, :password, :rank)');
        $addUser->bindParam(':lname', $lname, PDO::PARAM_STR, 50);
        $addUser->bindParam(':fname', $fname, PDO::PARAM_STR, 50);
        $addUser->bindParam(':email', $email, PDO::PARAM_STR, 100);
        $addUser->bindParam(':password', $password, PDO::PARAM_STR, 100);
        $addUser->bindParam(':rank', $rank, PDO::PARAM_STR, 50);

        if (!$error) {
            if($addUser->execute()) {
                require 'enigmemanager.class.php';
                $id = $this->getDb()->lastInsertId();
                $user->setId($id);
                enigmeManager::addPlay($id,1);
                if ($user->getRank() == 'Administrateur') {
                    $user->setEnigme(1337);
                } else {
                    $user->setEnigme(1);
                }
                $user->setTempban(NULL);
                $returnMsg = $user;
            } else {
                if (!isset($returnMsg)) {
                    $returnMsg = false;
                    $error = true;
                }
            }
        }


        return $returnMsg;
    }

    public function updateUser($user, $s = false) {
        $id = $user->getId();
        $lname = $user->getLastName();
        $fname = $user->getFirstName();
        $email = $user->getEmail();
        if (isset($s) && $s) {
            $password = $user->getPassword();
        } else {
            $password = User::securePassword($user->getPassword());
        }
        $rank = $user->getRank();
        $enigme = $user->getEnigme();
        $temp_ban = $user->getTempban();

        if (empty($user->getPassword())) {
            $sql = 'UPDATE gui_users SET user_lname = :lname, user_fname = :fname, user_email = :email, user_rank = :rank, user_enigme = :enigme, user_temp_ban = :temp_ban WHERE user_id = :id';
            $updateUser = $this->getDb()->prepare($sql);
        } else {
            $sql = 'UPDATE gui_users SET user_lname = :lname, user_fname = :fname, user_email = :email, user_password = :password,user_rank = :rank, user_enigme = :enigme, user_temp_ban = :temp_ban WHERE user_id = :id';
            $updateUser = $this->getDb()->prepare($sql);
            $updateUser->bindParam(':password', $password, PDO::PARAM_STR, 100);
        }

        $updateUser->bindParam(':lname', $lname, PDO::PARAM_STR, 50);
        $updateUser->bindParam(':fname', $fname, PDO::PARAM_STR, 50);
        $updateUser->bindParam(':email', $email, PDO::PARAM_STR, 100);
        $updateUser->bindParam(':rank', $rank, PDO::PARAM_STR, 50);
        $updateUser->bindParam(':enigme', $enigme, PDO::PARAM_INT, 11);
        $updateUser->bindParam(':temp_ban', $temp_ban, PDO::PARAM_STR, 20);
        $updateUser->bindParam(':id', $id, PDO::PARAM_INT, 11);

        if ($updateUser->execute()) {
            $user->setPassword($password);
            return $user;
        } else {
            return 'Erreur lors de la modification de l\'utilisateur';
        }
    }

    public function deleteUser($user) {
        $id = $user->getId();

        $deleteUser = $this->getDb()->prepare('DELETE FROM gui_users WHERE user_id = :id');
        $deleteUser->bindParam(':id', $id, PDO::PARAM_INT, 11);

        if ($deleteUser->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers($table = true, $attr = '',$value = '') {
        if (isset($attr) AND !empty($attr) AND isset($value) AND !empty($value)) {
            $sql = 'SELECT * FROM gui_users WHERE '.$attr.' = '.$value;
        } else {
            $sql = 'SELECT * FROM gui_users';
        }

        $getUsers = $this->getDb()->query($sql);
        $return = '';
        if ($table) {
            while ($data = $getUsers->fetch()) {
                switch ($data['user_rank']) {
                    case 'Administrateur':
                        $rankClass = 'text-danger font-weight-bold';
                        $rankBan = 'Bannir';
                        break;
                    case 'Utilisateur':
                        $rankClass = 'text-info';
                        $rankBan = 'Bannir';
                        break;
                    case 'Banni':
                        $rankClass = 'text-secondary font-weight-bold';
                        $rankBan = 'Débannir';
                        break;
                    default:
                        $rankClass = '';
                        $rankBan = 'Bannir';
                        break;
                }
                $return .= '<tr>'."\r\n";
                $return .= '<td>'.$data['user_lname'].'</td>'."\r\n";
                $return .= '<td>'.$data['user_fname'].'</td>'."\r\n";
                $return .= '<td>'.$data['user_email'].'</td>'."\r\n";
                $return .= '<td>'.$data['user_enigme'].'</td>'."\r\n";
                $return .= '<td><span class="'.$rankClass.'">'.$data['user_rank'].'</span></td>'."\r\n";
                $return .= '<td><button class="badge badge-warning btn-update" data-user-id="'.$data['user_id'].'" >Modifier</button> <button class="badge badge-danger btn-delete" data-user-id="'.$data['user_id'].'">Supprimer</button> <button class="badge badge-dark btn-ban" data-user-id="'.$data['user_id'].'">'.$rankBan.'</button></td>'."\r\n";
                $return .= '</tr>'."\r\n";
            }

        } else {
            $data = $getUsers->fetch();
            $return = json_encode($data);
        }


        return $return;
    }

    public function toggleBanUser($user, $time = -1) {
        $userLastRank = $user->getRank();

        $toR = true;
        switch ($userLastRank) {
            case 'Banni':
                $user->setRank('Utilisateur');
                $user->setTempban(NULL);
                $mailContent = 'Vous avez été débanni de GuiMoves.';
                break;
            default:
                $user->setRank('Banni');
                $user->setTempban($time);
                if ($time == -1) {
                    $mailTime = 'Indefini';
                } else {
                    $mailTime = 'le '.$time;
                }
                $mailContent = 'Vous avez été banni de GuiMoves. Vous pourrez vous reconnecter: '.$mailTime.'.';
                break;
        }


                $mailSub = 'Guimoves : Bannissement';
                userManager::sendMail($user->getEmail(),$mailContent,$mailSub);

                if($this->updateUser($user, true)) {
                    $toR = true;
                } else {
                    $toR = false;
                }

        return $toR;
    }

    public function banUser($user) {
        $user->setRank('Banni');
        $this->updateUser($user, true);
    }

    public function resetPasswordMail($email) {
        $getUserInfo = $this->getDb()->prepare('SELECT user_email FROM gui_users WHERE user_email = :user_email');
        $getUserInfo->bindParam(':user_email',$email,PDO::PARAM_STR,100);
        $getUserInfo->execute();
        $data = $getUserInfo->fetch();
        if ($data['user_email'] == $email) {
            self::sendMail($email, 'Bonjour, vous avez demandé à réinitialiser votre mot de passe, voici un lien pour le faire: http://guimoves.oliviso.fr/resetPass.php?key='.User::securePassword($email),'Reset Password GuiMoves');
            return 'true';
        } else {
            return false;
        }
    }

    public function resetPasswordWithKey($key,$password) {
        $getEmail = $this->getDb()->query('SELECT * FROM gui_users');
        $getEmail->execute();
        $r = '';
        while ($data = $getEmail->fetch()) {
            $pMail = User::securePassword($data['user_email']);
            $r .= $pMail.' + ';
            if ($key == $pMail) {
                $user = new User($data['user_lname'],$data['user_fname'],$data['user_email'],$data['user_password'],$data['user_enigme'],$data['user_rank'],$data['user_temp_ban']);
                $user->setId($data['user_id']);
                $user->setPassword($password);
                $this->updateUser($user);
                $ui = true;
            }
        }

        if (isset($ui)) {
            return $user;
        } else {
            return 'Erreur: Impossible de modifier votre mot de passe';
        }
    }

    static function sendMail($mailDest, $mailContent, $mailSubject) {
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailDest))
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }

        //=====Création du header de l'e-mail
        $boundary = "-----=".md5(rand());
        $mailHeader = "From: \"GuiMoves\"<contact@oliviso.fr>".$passage_ligne;
        $mailHeader .= "Reply-to: \"GuiMoves\" <contact@oliviso.fr>".$passage_ligne;
        $mailHeader .= "MIME-Version: 1.0".$passage_ligne;
        $mailHeader .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========

        $message= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$mailContent.$passage_ligne;

        mail($mailDest, $mailSubject, $message, $mailHeader);

    }

    public function loginAdminAttempt($email, $pass) {
        $pass = User::securePassword($pass);

        $loginAttempt = $this->getDb()->prepare('SELECT * FROM gui_users WHERE user_email = :email');
        $loginAttempt->bindParam(':email', $email, PDO::PARAM_STR, 100);

        $loginAttempt->execute();
        $u = $loginAttempt->fetch();
        if ($u['user_email'] == $email && $u['user_password'] == $pass) {
            if ($u['user_rank'] != 'Administrateur') {
                $return['code'] = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Erreur lors de l\'authentification, vous n\'êtes pas Administrateur.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
            } else {
                $_SESSION['user'] = new User($u['user_lname'], $u['user_fname'], $u['user_email'], $u['user_password'], $u['user_enigme'], $u['user_rank'], $u['user_temp_ban']);
                $_SESSION['user']->setId($u['user_id']);
                $_SESSION['allowed'] = '0li';
                $return['code'] = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                Connexion Réussie !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
            }

        } else {
            $return['code'] = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Erreur lors de l\'authentification, veuillez vérifier vos identifiants.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
        }

        return $return['code'];
    }

    public function loginAttempt($email, $pass) {
        $pass = User::securePassword($pass);

        $loginAttempt = $this->getDb()->prepare('SELECT * FROM gui_users WHERE user_email = :email');
        $loginAttempt->bindParam(':email', $email, PDO::PARAM_STR, 100);

        $loginAttempt->execute();
        $u = $loginAttempt->fetch();
        if ($u['user_email'] == $email && $u['user_password'] == $pass) {
            $_SESSION['user'] = new User($u['user_lname'], $u['user_fname'], $u['user_email'], $u['user_password'], $u['user_enigme'], $u['user_rank'], $u['user_temp_ban']);
            $_SESSION['user']->setId($u['user_id']);
            $_SESSION['allowed'] = '0li';
            $return['code'] = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                Connexion Réussie !
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';

        } else {
            $return['code'] = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                 Erreur lors de l\'authentification, veuillez vérifier vos identifiants.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
        }

        return $return['code'];
    }

    static function checkIfLogin($user, $page = '') {
        switch (strtolower($page)) {
            case 'login.php':
            case 'resetpass.php':
                $away = false;
                break;
            default:
                if (!isset($user) OR !isset($_SESSION['user']) OR $_SESSION['user']->getRank() != 'Administrateur') {
                    session_destroy();
                    session_unset();
                    $away = true;
                } else {
                    $away = false;
                }


                break;
        }

        if ($away) {
            header('Location: login.php');
        }
    }

    static function checkIfUserLogin() {
        session_start();
        if (!isset($_SESSION['user']) OR $_SESSION['allowed'] != '0li') {
            $r = 'away';
        } else {
            $r = '';
        }

        return $r;
    }

    // GETTERS
    public function getDb()
    {
        return $this->db;
    }

    // SETTERS
    public function setDb($connexion)
    {
        $this->db = $connexion;
    }


}