<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;
use Createlinux\ClassCreator\Builders\FunctionBuilder;
use \Createlinux\ClassCreator\Builders\Function\MethodDataType;
use \Createlinux\ClassCreator\Builders\Function\FunctionArgument;
use \Createlinux\ClassCreator\Builders\Function\FunctionIdentify;


$classBuilder = new ClassBuilder('DoctorUser', "用户");
$classMethod = new FunctionBuilder("store");

$arg1 = new FunctionArgument("name",MethodDataType::string,"张三");
$classMethod->getArguments()->put($arg1);
$arg2 = new FunctionArgument('age',MethodDataType::int,18);
$classMethod->getArguments()->put($arg2);

$classBuilder->getMethods()->put($classMethod);

$body  = <<<BODY
    //TODO
BODY;

$classMethod->setBody($body);
print_r($classMethod->getOutputPlainText());