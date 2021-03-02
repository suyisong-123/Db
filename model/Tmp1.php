<?php


namespace db\Model;

use db\ModelInterface;

class Tmp1 implements ModelInterface
{
    protected $id; //默认为空
    protected $name;

    public function __construct($id=null, $name=null)
    {
        $this->id = $id;
        $this->name = $name;
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
     * @return array 返回属性数组
     */
    public function getProperties():array{
        return get_object_vars($this);
    }


}