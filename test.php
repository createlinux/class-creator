<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;

$doctorBuilder = create_class_builder("Doctor", "\\App\\Http\\Controllers", "医生模型");

$userBuilder = create_class_builder("User", "\\App\\Models", "用户");


$UserBuilder = create_class_builder('DoctorUser', "App\Http\\Controllers", "用户");

$UserBuilder->setExtend($doctorBuilder);
$UserBuilder->pushUsingClass($UserBuilder);

$method = $UserBuilder->createMethod("store");
$method
    ->getReturnType()
    ->pushFloat()
    ->pushInt()
    ->pushObject(ClassBuilder::class, $UserBuilder);

$method->createArgument("name")
    ->getDataType()
    ->pushCallable()
    ->pushString();
$method->createArgument("age", 21)
    ->getDataType()
    ->pushInt();

$methodDestroy = $UserBuilder->createMethod("destroy");
$methodDestroy
    ->getReturnType()
    ->pushFloat()
    ->pushInt();


print_r($UserBuilder->getOutputPlainText());