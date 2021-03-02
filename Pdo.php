<?php

namespace db;

use db\Model\Tmp1;

class Pdo implements DbInterface{

    private $pdo;
    private $fullTable; #操作的表命名空间
    private $table;     #表名

    /**
     * Pdo constructor.
     * @param $config
     * @throws \Exception 抛出连接数据库移除
     */
    public function __construct($config, $table=null)
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
            echo $e->getMessage();
        }
        if($table){
            $this->fullTable = $table;
            $this->table = strtolower( substr(strrchr($this->fullTable, '\\'), 1));
        }


    }
    public function setTable($table){
        $this->table = strtolower( substr(strrchr($this->fullTable, '\\'), 1));
        $this->fullTable = $table;
    }
    public function getTable(){
        return $this->fullTable;
    }

    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function addRecord(ModelInterface $model)
    {
        // TODO: Implement addRecord() method.

        //生成值列表
        if($model instanceof $this->fullTable){
            $lists = $model->getProperties();
            try{
                //插入数据的处理
                $values = "";
                foreach($lists as $key=>$value){
                    if(!isset($value)){
                        $values .=",null";
                    }else{
                        $values .=",'{$value}'";
                    }

                }
                $values = substr($values, 1);

                $sql = "insert into {$this->table} values({$values})";
                //预处理/执行机制
                $stmt = $this->pdo->prepare($sql);
                $res = $stmt->execute();
            }catch(\PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }else{
            echo '1';
            return false;
        }
        return $res;

    }

    /**
     * 通过id删除记录
     * @param 记录名 $id
     */
    public function deleteRecord(ModelInterface $model):bool
    {
        // TODO: Implement deleteRecordById() method.
        if($model instanceof $this->fullTable){
            //删除一条记录
            try{
                $id = $model->getId();
                if($id){
                    $sql = "delete from {$this->table} where id={$id}";
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->execute();
                }else{
                    return false;
                }
            }catch (\PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }else{
            return false;
        }
        return true;

    }

    /**
     * @param 更改的记录数组 $data
     * @param 记录id $id
     * @return bool
     */
    public function updateRecord(ModelInterface $model):bool
    {
        // TODO: Implement updateRecordById() method.
        //update table set id=id, field=field where id=""
        if($model instanceof  $this->fullTable){

            try{
                //移除开头主键
                $lists = $model->getProperties();
                $id = $lists['id'];
                array_shift($lists);
                //设置set列表
                $set = "";
                foreach($lists as $key=>$value){
                    $set .= "{$key}='{$value}',";
                }
                //移除set最后一个,号
                $set = substr($set, 0, -1);

                $sql = "update {$this->table} set {$set} where `id`=?"; //update tmp1 set name='name' where id=6;
                $stmt = $this->pdo->prepare($sql);
                $res = $stmt->execute([$id]);

            }catch(\PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }else{
            return false;
        }
        return $res;


    }

    /**
     * @param 通过id查询记录 $id
     * @return mixed|null
     */
    public function selectRecordById($id)
    {
        // TODO: Implement selectRecordById() method.
        $model = new $this->fullTable();
        try{
            $sql = "select * from {$this->table} where id={$id}";
            $stmt = $this->pdo->prepare($sql);
            $res = $stmt->execute();
            if($res){
                $stmt->setFetchMode(\PDO::FETCH_ASSOC);
                while($row = $stmt->fetch()){
                    //设置属性
                    foreach($row as $key=>$value){
                        //下划线转驼峰
                        $key = Tool::underlineToHump($key);
                        $method = "set".ucfirst($key);
                        $model->$method($value);
                    }
                }
            }else{
                return null;
            }

        }catch (\PDOException $e){
            echo $e->getMessage();
            return null;
        }
        return $model;

    }
}