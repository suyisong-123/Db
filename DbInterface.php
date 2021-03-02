<?php

namespace db;
/**
 * 数据库接口
 *
 * 修改后的值
 */
interface DbInterface{
    /**
     * @param ModelInterface $data
     * @return mixed
     */
    public function addRecord(ModelInterface $model);

    /**
     * 通过记录主键删除一条记录
     * @param $id 记录名
     */
    public function deleteRecord(ModelInterface $model);

    /**
     * 更改一条记录
     * @param $data 更改的记录数组
     * @param $id 记录id
     */
    public function updateRecord(ModelInterface $model);

    /**
     * 查询一条记录
     * @param $id 通过id查询记录
     */
    public function selectRecordById($id);


}