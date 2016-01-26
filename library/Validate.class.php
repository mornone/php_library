<?php
/**
 * 校验类
 * @author Flc <2016-01-26 14:42:45>
 */
namespace Library;


class Validate{

    /**
     * 校验字符串是否为空
     * @param  string  $string 带校验字符串
     * @return boolean         
     */
    public static function isEmpty($string){
        if(!isset($string))
            return true;
        if($string === null )
            return true;
        if(trim($string) === "")
            return true;
        
        return false;
    }

    /**
     * 校验字符串是否为数字
     * @param  number  $string 数字
     * @return boolean         
     */
    public static function isNumeric($string){
        if (!is_numeric($string)) 
            return false;

        return true;
    }

    /**
     * 校验是否为字符串
     * @param  string  $string 待校验字符
     * @return boolean         
     */
    public static function isString($string){
        if (!is_string($string)) 
            return false;

        return true;
    }

    /**
     * 校验是否为int类型
     * @param  integer  $string 待校验字符
     * @return boolean         
     */
    public static function isInteger($string){
        if (!is_integer($string)) 
            return false;

        return true;
    }

    public static function isEmail($string){}

    public static function isMobile($string){}

    public static function isUrl($string){}

    // 校验值的长度是否符合所属范围
    public static function chkRangeLength($string, $minlength = 0, $maxlength = 0) {}

    public static function chkMinLength($string, $minlength = 0){}

    public static function chkMaxLength($string, $maxlength = 0){}

    // 校验值是否在所属范围内
    public static function chkRange($string, $min = 0, $max = 0) {}

    // 校验值的是不是符合最小值
    public static function chkMin($string, $min = 0){}


    public static function chkMax($string, $max = 0){}

    // 是否为图片(jpeg, png, bmp, gif 或 svg)
    public static function isImage($filename){}

    public static function isDate(){}

}