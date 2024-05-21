<?php
require_once __DIR__ . "/../vendor/autoload.php";

use \Createlinux\ClassCreator\Builders\ClassProperty;
use \Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;

//TODO 测试
$classProperty = new ClassProperty("idCard", VisibilityIdentify::protected);
print_r("获取名称:". $classProperty->getName()."\n");