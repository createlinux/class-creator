<?php
require_once __DIR__ . "/../vendor/autoload.php";

//TODO 测试
use \Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;

$doctorBuilder = create_class_builder("Doctor", "App\\Http\\Controllers", "医生");
$doctorBuilder->addProperty('name')
    ->getDataType()
    ->pushString()
    ->pushNull();
$doctorBuilder->addProperty('mobile')->getDataType()->pushString();

//创建store方法
$storeMethod = $doctorBuilder->createMethod("store", VisibilityIdentify::protected);
$storeMethod
    //为store方法创建一个参数，名称为name，默认值为空或者输入张三
    ->createArgument('name', "张三")
    //设置参数类型
    ->getDataType()
    ->pushString()
    ->pushInt()
    ->pushCallable()
    ->pushNull();
print_r($doctorBuilder->getOutputPlainText());