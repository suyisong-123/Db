<?php

include_once __DIR__."/AutoLoad.php";
\AutoLoad\Loader::init(__DIR__."/../");

$conn = new \db\Pdo(include_once __DIR__."/config.php", \db\Model\User2::class);

//1.添加一条记录
/*$model = new \db\Model\User2();
$model->setTel('17861121234');
$model->setPwd(md5("123456"));
$model->setName("yd_2020_2060");
$model->setStatus(0);
$model->setDjTime(date('Y-m-d H:i:s', time()));

$res = $conn->addRecord($model);
if($res){
    echo '插入成功!';
}else{
    echo '插入失败!';
}*/


//2.查询记录
$model = $conn->selectRecordById(25);
//var_dump($model);

//3.修改记录
/*$model->setName('哈哈');
var_dump($conn->updateRecord($model));*/

//4.删除记录
$res = $conn->deleteRecord($model);
var_dump($res);