<?php


namespace Db\Model;


use Db\ModelInterface;

class Tmp1 implements ModelInterface
{
    protected $id=null; //默认为空
    protected $name;

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