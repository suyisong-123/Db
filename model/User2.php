<?php


namespace db\Model;


use db\ModelInterface;

class User2 implements ModelInterface
{
    protected $id;
    protected $tel;
    protected $pwd;
    protected $name;
    protected $status;
    protected $dj_time;


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
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDjTime()
    {
        return $this->dj_time;
    }

    /**
     * @param mixed $dj_time
     */
    public function setDjTime($dj_time)
    {
        $this->dj_time = $dj_time;
    }


    public function getProperties(): array
    {
        // TODO: Implement getProperties() method.
        return get_object_vars($this);
    }
}