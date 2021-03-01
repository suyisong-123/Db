<?php

namespace Db;
use Db\DbInterface;

class Pdo implements DbInterface{

    private $pdo;
    /**
     * PDO constructor.
     * @param $config 配置参数
     */
    public function __construct($config)
    {
        $dsn = "";
        $username = "";
        $passwd = "";
        $option = "";
        $pdo = new \PDO($dsn, $username, $passwd, $option);
    }

    public function addRecord($data)
    {
        // TODO: Implement addRecord() method.
    }

    public function deleteRecordById($id)
    {
        // TODO: Implement deleteRecordById() method.
    }

    public function updateRecordById($data, $id)
    {
        // TODO: Implement updateRecordById() method.
    }

    public function selectRecordById($id)
    {
        // TODO: Implement selectRecordById() method.
    }
}