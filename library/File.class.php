<?php
/**
 * 文件操作类
 * @author Flc <2016-01-26 14:42:45>
 */
namespace Library;

use Exception;

class File{

    /**
     * 静态文件组
     * @var array
     */
    private static $files = array();

    /**
     * 读取文件
     * @return [type] [description]
     */
    public static function read($filename){
        if (!self::get($filename)) {
            return false;
        }
        return self::get($filename)['content'];
    }

    /**
     * 文件写入
     * @param  [type] $filename [description]
     * @param  string $content  [description]
     * @return [type]           [description]
     */
    public static function put($filename, $content = ''){
        $dir         =  dirname($filename);
        if(!is_dir($dir)){
            mkdir($dir, 0777, true);
        }

        if(false === file_put_contents($filename, $content)){
            throw new Exception('文件写入失败:' . $filename);
        }else{
            self::get($filename, true); // 刷新文件数据
            return true;
        }
    }

    /**
     * 文件内容追加
     * @param  string $filename 文件路径
     * @param  string $content  文件内容
     * @return boolean
     */
    public static function append($filename, $content = ''){
        if (self::has($filename)) {
            $content = self::read($filename) . $content;
        }
        return self::put($filename, $content);
    }

    /**
     * 获取文件后缀
     * @param  string $filename 文件路径
     * @return string|false           
     */
    public static function getExt($filename){
        if (!self::get($filename)) {
            return false;
        }
        return self::get($filename)['ext'];
    }

    /**
     * 获取文件名
     * @param  string $filename 文件路径
     * @param  is_ext $is_ext   是否获取全名（包含后缀），默认否
     * @return string|false           
     */
    public static function getName($filename, $is_ext = false){
        if (!self::get($filename)) {
            return false;
        }
        if ($is_ext) {
            return self::get($filename)['filename'];
        } else {
            return self::get($filename)['basename'];
        }
    }

    /**
     * 获取文件所在目录路径
     * @param  string $filename 文件路径
     * @return string|false           
     */
    public static function getPath($filename){
        if (!self::get($filename)) {
            return false;
        }
        return self::get($filename)['dirname'];
    }

    /**
     * 获取文件是否可用
     * @param  string  $filename 文件路径
     * @return boolean           
     */
    public static function has($filename){
        return is_file($filename);
    }

    /**
     * 获取文件信息
     * @param  string  $filename 文件路径
     * @param  boolean $refresh 是否刷新文件数据
     * @return array           
     */
    protected static function get($filename, $refresh = false){
        if (!$refresh && array_key_exists($filename, self::$files)) {
            return self::$files[$filename];
        }

        if (!self::has($filename)) {
            return self::$files[$filename] = false;
        }

        $pathinfo = pathinfo($filename);

        return self::$files[$filename] = array(
            'content'  => file_get_contents($filename),  // 文件内容
            'mtime'    => filemtime($filename), // 上次修改时间
            'size'     => filesize($filename),  // 文件大小
            'basename' => $pathinfo['basename'],  // 文件名，不包含后缀
            'filename' => $pathinfo['filename'],  // 文件名，包含后缀
            'ext'      => $pathinfo['extension'],  // 文件后缀
            'dirname'  => $pathinfo['dirname'],  // 文件保存目录
        );
    }
}