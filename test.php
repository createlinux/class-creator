<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;
use Createlinux\ClassCreator\Builders\ClassMethod;
use \Createlinux\ClassCreator\Builders\Method\MethodDataType;
use \Createlinux\ClassCreator\Builders\Method\MethodArgument;
use \Createlinux\ClassCreator\Builders\Method\MethodIdentify;


$classBuilder = new ClassBuilder('DoctorUser', "用户");
$classMethod = new ClassMethod("store",MethodIdentify::public);

$arg1 = new MethodArgument("name",MethodDataType::string,"张三");
$classMethod->getArguments()->put($arg1);
$arg2 = new MethodArgument('age',MethodDataType::int,18);
$classMethod->getArguments()->put($arg2);

$classBuilder->getMethods()->put($classMethod);

$body  = <<<BODY
    //TODO
BODY;

$classMethod->setBody($body);
print_r($classMethod->getOutputPlainText());