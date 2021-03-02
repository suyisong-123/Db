<?php

namespace db;
use db\interface\DbInterface;

class Pdo implements DbInterface{

    private $pdo;
    private $table; #操作的表


    /**
     * Pdo constructor.
     * @param $config
     * @throws \Exception 抛出连接数据库移除
     */
    public function __construct($config, $table)
    {

        $dbname = $config['dbname']??'test';
        $host = $config['host']??'127.0.0.1';
        $charset = $config['charset']??'utf8';
        $dsn = "mysql:dbname=".$dbname.";host=".$host.";charset=".$charset;
        $username = $config['user']??'root';
        $passwd = $config['password']??'forlove123';
        $option = [];
        try{
            $this->pdo = new \PDO($dsn, $username, $passwd, $option);
        }catch (\Exception $e){
            throw $e;
        }
        $this->table = ucfirst(strtolower($table));

    }

    /**
     * 增加记录
     * @param 数据 $data
     */
    public function addRecord($data)
    {
        // TODO: Implement addRecord() method.
        //生成值列表
        if($data instanceof $this->table){
            $lists = $data->getPropertys();
            try{
                $valuelists =
                $sql = "insert into table values('字段1', '字段2', '字段3')";
                //预处理/执行机制
                $this->pdo->prepare();

            }catch(\PDOException $e){
                throw $e;
            }
        }else{
            return false;
        }

    }

    public function deleteRecordById($id)
    {
        // TODO: Implement deleteRecordById() method.
    }

    public function updateRecordById($data, $id)
    {
        // TODO: Implement updateRecordById() method.
    }

    public function selectRecordById($id):array
    {
        // TODO: Implement selectRecordById() method.
    }
}