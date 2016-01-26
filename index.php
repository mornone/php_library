<?php
require_once __DIR__ . '/vendor/autoload.php';

use Library\File;


$rs =  File::getExt('./sa/123.txt');
print_r($rs);