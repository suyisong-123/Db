<?php


namespace db;


interface ModelInterface
{
    /**
     * 返回得到的属性数组
     * @return array
     */
    public function getProperties():array;
}