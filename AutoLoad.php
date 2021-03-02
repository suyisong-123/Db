<?php


/*
 *实现类的自动加载
 * 1.实现对文件的加载
 * 2.自动加载函数
 * 3.目录的添加
 * 4.命名空间的处理
*/

namespace AutoLoad;

class Loader{
    private static $dirs=array();       //目录集合
    const UNABLE_TO_LOAD = "无法打开类";
    private static $registered = 0;

    //5.初始化调用
    public function __construct($dirs = array())
    {
        self::init($dirs);
    }

    //4.注册类自动加载函数autoLoad
    public static function init($dirs = array()){
        if($dirs){
            //添加目录
            self::addDirs($dirs);
        }
        if(self::$registered == 0){ //查看是否注册过
            spl_autoload_register(__CLASS__."::autoLoad");  //__CLASS__表示该类
            self::$registered++;
        }
    }

    //3.添加目录
    public static function addDirs($dirs){
        if(is_array($dirs)){
            //目录集合为数组
            self::$dirs = array_merge(self::$dirs, $dirs);  //注意键名索引

        }else{
            self::$dirs[] = $dirs;
        }
    }
    //2.实现类的自动加载,$class为命名空间中的类
    public static function autoLoad($class){
        $success = false;
        $fn = str_replace('\\',DIRECTORY_SEPARATOR, $class).".php";    //将类中的文件名替换
        foreach(self::$dirs as $start){ //查看是否存在合适的路径
            $file = $start.DIRECTORY_SEPARATOR.$fn;     //构建文件名的完整路径
            if(self::loadFile($file)){
                $success = true;
                break;
            }
        }
        //加载当前目录下的文件
        if(!$success){
            $file = __DIR__. DIRECTORY_SEPARATOR. $fn;
            if(!self::loadFile($file)){
                throw new \Exception(self::UNABLE_TO_LOAD." ".$class);  //\Exception抛出异常
            }
        }
        return $success;

    }
    //1.加载单一文件,$file:文件的完整路径
    public static function loadFile($file){
        if(file_exists($file)){ //文件存在
            require_once $file;
            return TRUE;
        }else{
            return FALSE;
        }

    }
}
