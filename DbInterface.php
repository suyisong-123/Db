<?php

namespace Db;
/**
 * 数据库接口
 */
interface DbInterface{
    /**
     * 增加一条记录
     * @param $data 数据
     */
    public function addRecord($data);

    /**
     * 通过记录主键删除一条记录
     * @param $id 记录名
     */
    public function deleteRecordById($id);

    /**
     * 更改一条记录
     * @param $data 更改的记录数组
     * @param $id 记录id
     */
    public function updateRecordById($data, $id);

    /**
     * 查询一条记录
     * @param $id 通过id查询记录
     */
    public function selectRecordById($id);
}