<?php


namespace db;


/**
 * 一些基础功能
 * Class Tool
 * @package db
 */
class Tool
{
    /**
     * 下划线转驼峰
     * @param string $var 接受的下划线字符串
     */
    public static function underlineToHump($var){
        $res = '';
        for($i=0; $i<strlen($var); $i++){
            if($var[$i] == '_'){
                $i++;
                if(isset($var[$i])){
                    $num = ord($var[$i]);
                    if($num>=97 && $num<=122){
                        $res .= chr($num-32);
                    }

                }
            }else{
                $res .= $var[$i];
            }
        }
        return $res;
    }
}