<?php


//自动加载

include_once __DIR__."/AutoLoad.php";
\AutoLoad\Loader::init(__DIR__."/../");

$conn = new \db\Pdo(include_once __DIR__."/config.php", \db\Model\Tmp1::class);

//插入一条数据
$model = new \db\Model\Tmp1(null, '小王');
$res = $conn->addRecord($model);


/*
 * 删除一条数据
 * */
$res = $conn->deleteRecord($model);

/*
 * 更新一条数据
 *
$model = $conn->selectRecordById(6);

$model->setName('hi');

$res = $conn->updateRecord($model);
var_dump($res);
 * */





