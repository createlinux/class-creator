<?php
require_once __DIR__ . "/../vendor/autoload.php";

use \Createlinux\ClassCreator\Builders\ClassProperty;
use \Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;
use \Createlinux\ClassCreator\Builders\ClassBuilder;

//TODO 测试
$classProperty = new ClassProperty("idCard", VisibilityIdentify::protected);
$classWithNamespace = 'App\\Models\\Doctor';
$parentClassBuilder = new \Createlinux\ClassCreator\Builders\ClassBuilder('User','App\\Models','用户');
$classProperty->getDataType()->pushObject($classWithNamespace,$parentClassBuilder);

print_r("获取名称:". $classProperty->getName()."\n");
print_r($classProperty->getDataType()->implode());