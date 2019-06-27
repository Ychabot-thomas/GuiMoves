<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 09/11/2018
 * Time: 13:51
 */

class enigmeManager
{
    protected $db;

    // CONSTRUCTOR
    public function __construct($host, $name, $user, $password)
    {
        $db = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $password);
        $this->setDb($db);
    }

    // METHODS
    public function addEnigme($enigme) {
        $insertEnigme = $this->getDb()->prepare('INSERT INTO gui_enigmes (enigme_name, enigme_content, enigme_code, enigme_attempt_to_fail, enigme_total_attempt) VALUES ( :name, :content, :code, :attempt_to_fail, :total_attempt)');

        $name = $enigme->getName();
        $content = $enigme->getContent();
        $code = $enigme->getCode();
        $attempt = $enigme->getAttemptToFail();
        $total = $enigme->getTotalAttempt();

        $insertEnigme->bindParam(':name',$name,PDO::PARAM_STR);
        $insertEnigme->bindParam(':content',$content,PDO::PARAM_STR);
        $insertEnigme->bindParam(':code',$code,PDO::PARAM_STR);
        $insertEnigme->bindParam(':attempt_to_fail',$attempt,PDO::PARAM_STR);
        $insertEnigme->bindParam(':total_attempt',$total,PDO::PARAM_STR);

        if ($insertEnigme->execute()){
            $id = $this->getDb()->lastInsertId();
            $enigme->setId($id);
            return $enigme;
        } else {
            return false;
        }
    }

    public function updateEnigme($enigme) {
        $updateEnigme = $this->getDb()->prepare('UPDATE gui_enigmes SET enigme_name = :name, enigme_content = :content, enigme_code = :code, enigme_attempt_to_fail = :attempt_to_fail, enigme_total_attempt = :total_attempt WHERE enigme_id = :id');

        $name = $enigme->getName();
        $content = $enigme->getContent();
        $code = $enigme->getCode();
        $attempt = $enigme->getAttemptToFail();
        $total = $enigme->getTotalAttempt();
        $id = $enigme->getId();

        $updateEnigme->bindParam(':name',$name,PDO::PARAM_STR);
        $updateEnigme->bindParam(':content',$content,PDO::PARAM_STR);
        $updateEnigme->bindParam(':code',$code,PDO::PARAM_STR);
        $updateEnigme->bindParam(':attempt_to_fail',$attempt,PDO::PARAM_STR);
        $updateEnigme->bindParam(':total_attempt',$total,PDO::PARAM_STR);
        $updateEnigme->bindParam(':id',$id,PDO::PARAM_INT);

        if ($updateEnigme->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteEnigme($id) {
        $deleteEnigme = $this->getDb()->prepare('DELETE FROM gui_enigmes WHERE enigme_id = :id');

        $deleteEnigme->bindParam(':id', $id, PDO::PARAM_INT);

        if ($deleteEnigme->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getEnigmes() {
        $get = $this->getDb()->query('SELECT * FROM gui_enigmes');
        $r ='';
        while ($data = $get->fetch()) {
            $r .= '<tr>'."\r\n";
            $r .= '<td>'.$data['enigme_name'].'</td>'."\r\n";
            $r .= '<td>'.htmlspecialchars($data['enigme_content']).'</td>'."\r\n";
            $r .= '<td>'.$data['enigme_code'].'</td>'."\r\n";
            $r .= '<td>'.$data['enigme_attempt_to_fail'].'</td>'."\r\n";
            $r .= '<td><button class="badge badge-warning btn-update" data-e-id="'.$data['enigme_id'].'" >Modifier</button> <button class="badge badge-danger btn-delete" data-e-id="'.$data['enigme_id'].'">Supprimer</button></td>'."\r\n";
            $r .= '<tr>'."\r\n";
        }

        return $r;
    }

    public function getEnigmeInfo($id) {
        $get = $this->getDb()->prepare('SELECT * FROM gui_enigmes WHERE enigme_id = :id');
        $get->bindParam(':id',$id,PDO::PARAM_INT);
        $get->execute();
        $data = $get->fetch();
        return json_encode($data);
    }

    static function addPlay($uid,$eid) {
        $ac =  new PDO('mysql:host=localhost;dbname=odyssea_guimoves;charset=utf8', 'gui', '7Jcmm6?9');
        $add = $ac->prepare('INSERT INTO gui_plays(_user_id,_enigme_id,play_time,play_attempts) VALUES(:uid,:eid,0,0)');
        $add->bindParam(':uid',$uid);
        $add->bindParam(':eid',$eid);
        if ($add->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static function upPlay($uid,$eid,$time,$attempts) {
        $ac =  new PDO('mysql:host=localhost;dbname=odyssea_guimoves;charset=utf8', 'gui', '7Jcmm6?9');
        $add = $ac->prepare('UPDATE gui_plays SET play_time = :time, play_attempts = :attempts WHERE _user_id = :uid AND _enigme_id = :eid');
        $add->bindParam(':time',$time);
        $add->bindParam(':attempts',$attempts);
        $add->bindParam(':uid',$uid);
        $add->bindParam(':eid',$eid);
        if ($add->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // GETTER & SETTER
    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;
    }


}