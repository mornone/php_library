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

echo Validate::isInteger('123123');