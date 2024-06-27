<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;

$doctorBuilder = create_class_builder("Doctor", "App\\Http\\Controllers", "医生模型");

$userBuilder = create_class_builder("User", "App\\Models", "用户");


$UserBuilder = create_class_builder('DoctorUser', "App\Http\\Controllers", "用户");

$UserBuilder->setExtend($doctorBuilder);

$UserBuilder->pushUsingClass($userBuilder);
$UserBuilder->pushUsingClass(create_class_builder("TestUser","App\\Http\\Controllers","测试用户"));

$method = $UserBuilder->createMethod("store");
$method
    ->getReturnType()
    ->pushFloat()
    ->pushInt()
    ->pushObject($userBuilder->getNameWithNamespace(), $UserBuilder);

$method->createArgument("name")
    ->getDataType()
    ->pushCallable()
    ->pushString();
$method->createArgument("age", 21)
    ->getDataType()
    ->pushInt();

$method->setBody(file_get_contents(__DIR__."/methods/store.php"));

$methodDestroy = $UserBuilder->createMethod("destroy");
$methodDestroy
    ->getReturnType()
    ->pushFloat()
    ->pushInt();

print_r($UserBuilder->getOutputPlainText());