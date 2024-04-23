<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;
use Createlinux\ClassCreator\Builders\ClassMethod;

$classBuilder = new ClassBuilder('DoctorUser', "用户");
$classBuilder->getMethods()->put(new ClassMethod("store"));

print_r($classBuilder->getMethods()->toArray());