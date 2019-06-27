<?php
/**
 * Created by PhpStorm.
 * User: Olivier
 * Date: 09/11/2018
 * Time: 13:51
 */

class Enigme
{
    protected $id;
    protected $name;
    protected $content;
    protected $code;
    protected $attempt_to_fail;
    protected $total_attempt;

    //C
    public function __construct($name,$content,$code,$attempt_to_fail,$total_attempt)
    {
        $this->setName($name);
        $this->setContent($content);
        $this->setCode($code);
        $this->setAttemptToFail($attempt_to_fail);
        $this->setTotalAttempt($total_attempt);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getAttemptToFail()
    {
        return $this->attempt_to_fail;
    }

    /**
     * @param mixed $attempt_to_fail
     */
    public function setAttemptToFail($attempt_to_fail)
    {
        $this->attempt_to_fail = $attempt_to_fail;
    }

    /**
     * @return mixed
     */
    public function getTotalAttempt()
    {
        return $this->total_attempt;
    }

    /**
     * @param mixed $total_attempt
     */
    public function setTotalAttempt($total_attempt)
    {
        $this->total_attempt = $total_attempt;
    }


}