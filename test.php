<?php
require_once __DIR__ . "/vendor/autoload.php";

use Createlinux\ClassCreator\Builders\ClassBuilder;

$classBuilder = new ClassBuilder('User',"用户");

$classBuilder->getFileContent();