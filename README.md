# PHP常用类库


## 文件操作类
```php
<?php
use Library\File;

$rs =  File::read('./sa/123.txt');
$rs =  File::put('./sa/123.txt', '1111');
$rs =  File::append('./sa/123.txt', '222');
$rs =  File::getName('./sa/123.txt');
$rs =  File::getExt('./sa/123.txt');
$rs =  File::getPath('./sa/123.txt');
$rs =  File::has('./sa/123.txt');
print_r($rs);
?>
```

## 加密解密类

```php
<?php
use Library\Crypt;

echo Crypt::encrypt('123123');
echo '<br />';
echo Crypt::decrypt('sXhy24WnpbCFqnGnr3Z1rbKzfal9sHZ1');
?>
```

## 校验类

```php
<?php
use Library\Validate;

echo Validate::isEmpty('1');
echo Validate::isNumeric(1);
echo Validate::isString('123123');
echo Validate::isInteger('123123');
echo Validate::isFloat('123123.00');
echo Validate::isEmail('1@1.com');
echo Validate::isMobile('17012234567');
echo Validate::isUrl('ftp://www.123.com');
echo Validate::isIp('1.1.1.1');
echo Validate::isJson('{"name":"BeJson","url":"http://www.SoSo.com"}');
echo Validate::isAlphaDash('12312--3');
echo Validate::isAlphaNum('123123');

// 未完待续...
?>
```