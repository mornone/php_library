<?php
/**
 * 加密解密类
 * @author Flc <2016-01-26 14:42:45>
 */
namespace Library;

use Exception;

class Crypt{

    /**
     * 加密解密类型
     */
    const CRYPT_TYPE_THINK  = 'Think';
    const CRYPT_TYPE_BASE64 = 'Base64';
    const CRYPT_TYPE_CRYPT  = 'Crypt';
    const CRYPT_TYPE_DES    = 'Des';

    /**
     * 加密解密类
     * @var null
     */
    protected static $handler = null;


    public static function init($type = Crypt::CRYPT_TYPE_THINK){
        $class = '\\Library\\Crypt\\' . $type;
        if (!class_exists($class)) {
            throw new Exception('加密类不存在');
        }
        self::$handler = $class;
    }

    /**
     * 加密字符串
     * @param  string  $string 明文
     * @param  string  $key    加密key
     * @param  integer $expire 有效时间，单位秒。0为永久
     * @return string
     */
    public static function encrypt($string, $key = '', $expire = 0){
        self::$handler == null && self::init();

        $class = self::$handler;
        return $class::encrypt($string, $key, $expire);
    }

    /**
     * 解密字符串
     * @param  string  $string 密文
     * @param  string  $key    加密key
     * @return string
     */
    public static function decrypt($string, $key = ''){
        self::$handler == null && self::init();

        $class = self::$handler;
        return $class::decrypt($string, $key);
    }
}