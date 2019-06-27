<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 05/11/2018
 * Time: 11:38
 */

class User {
    // PROPERTIES
    protected $id;
    protected $last_name;
    protected $first_name;
    protected $email;
    protected $password;
    protected $enigme;
    protected $rank;
    protected $tempBan;

    const SALT1 = '}T%uiR&K4Zt4Q23f<Ym*D9665bLs/jB5n@~:_Ts4';
    const SALT2 = '4@<{SGPvx7M8Y*.tDWEk542#fy23Cit{/ck97(;B';
    const SALT3 = 'WF4_477L@b9MS=c-L,;)t2pA6r4DDs_r6mk9eV,~';

    // CONSTRUCTOR
    public function __construct($lname, $fname, $email, $password, $enigme, $rank, $tempBan)
    {
        $this->setLastName($lname);
        $this->setFirstName($fname);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setEnigme($enigme);
        $this->setRank($rank);
        $this->setTempban($tempBan);
    }

    // METHODS
    static function securePassword($password) {

        $r = self::SALT1.$password.self::SALT2.$password.self::SALT3;
        $r = md5($r);
        return $r;
    }

    static function timeToMins($time) {
        return intval($time/60) . ' m ' . $time%60 . ' s';
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEnigme()
    {
        return $this->enigme;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getTempban()
    {
        return $this->tempban;
    }

    // SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLastName($last_name)
    {
        $this->last_name = ucfirst($last_name);
    }

    public function setFirstName($first_name)
    {
        $this->first_name = ucfirst($first_name);
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEnigme($enigme)
    {
        $this->enigme = $enigme;
    }

    public function setRank($rank)
    {
        switch ($rank) {
            case 'Administrateur':
            case 'Utilisateur':
            case 'Newbie':
            case 'Banni':
                break;
            default:
                $rank = 'Newbie';
                break;

        }
        $this->rank = $rank;
    }

    public function setTempban($tempban)
    {
        $this->tempban = $tempban;
    }
}