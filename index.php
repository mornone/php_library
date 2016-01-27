<?php
header ("Content-Type:text/html; charset=UTF-8");
require_once __DIR__ . '/vendor/autoload.php';

/**
 * 文件操作类
 * use Library\File;
 * $rs =  File::getExt('./sa/123.txt');
 * print_r($rs);
 */

/**
 * 加密机密类
 * use Library\Crypt;
 * 
 * echo Crypt::encrypt('123123');
 * echo '<br />';
 * echo Crypt::decrypt('sXhy24WnpbCFqnGnr3Z1rbKzfal9sHZ1');
 */


use Library\Validate;

//echo Validate::isEmpty('1');
//echo Validate::isNumeric(1);
//echo Validate::isString('123123');
//echo Validate::isInteger('123123');
//echo Validate::isFloat('123123.00');
//echo Validate::isEmail('1@1.com');
//echo Validate::isMobile('17012234567');
//echo Validate::isUrl('ftp://www.123.com');
//echo Validate::isIp('1.1.1.1');
//echo Validate::isJson('{"name":"BeJson","url":"http://www.SoSo.com"}');
//echo Validate::isAlphaDash('12312--3');
echo Validate::isAlphaNum('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');
//echo Validate::isInteger('123123');