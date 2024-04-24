<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;
use Createlinux\ClassCreator\Builders\ClassMethod;
use \Createlinux\ClassCreator\Builders\Method\MethodDataType;
use \Createlinux\ClassCreator\Builders\Method\MethodArgument;

$classBuilder = new ClassBuilder('DoctorUser', "用户");
$classMethod = new ClassMethod("store");

$arg1 = new MethodArgument("label",MethodDataType::string,"123");
$classMethod->getArguments()->put($arg1);

$classBuilder->getMethods()->put($classMethod);

print_r($classBuilder->getMethods()->toArray());