<?php

namespace Db;
use Db\DbInterface;

class Pdo implements DbInterface{

    private $pdo;

    /**
     * Pdo constructor.
     * @param $config
     * @throws \Exception 抛出连接数据库移除
     */
    public function __construct($config)
    {
        $dbname = $config['dbname']??'test';
        $host = $config['host']??'127.0.0.1';
        $charset = $config['charset']??'utf8';
        $dsn = "mysql:dbname=".$dbname.";host=".$host.";charset=".$charset;
        $username = $config['user']??'root';
        $passwd = $config['password']??'forlove123';
        $option = [];
        try{
            $pdo = new \PDO($dsn, $username, $passwd, $option);
        }catch (\Exception $e){
            throw $e;
        }

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