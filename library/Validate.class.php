<?php
/**
 * 校验类
 * @author Flc <2016-01-26 14:42:45>
 */
namespace Library;


class Validate{

    public static function isEmpty($string){}

    public static function isNumeric($string){}

    public static function isString($string){}

    public static function isInteger($string){}

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