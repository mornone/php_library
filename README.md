# PHP常用类库


## 文件操作类
```php
use Library\File;

$rs =  File::getExt('./sa/123.txt');
print_r($rs);
```

## 加密机密类

```php
use Library\Crypt;

echo Crypt::encrypt('123123');
echo '<br />';
echo Crypt::decrypt('sXhy24WnpbCFqnGnr3Z1rbKzfal9sHZ1');
```