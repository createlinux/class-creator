<?php

use \Createlinux\ClassCreator\Builders\ClassBuilder;

if (!function_exists('create_class_builder')) {
    function create_class_builder(string $name, string $namespace, string $label = '')
    {
        return new ClassBuilder($name, $namespace, $label);
    }
}

if (!function_exists('get_class_namespace')) {
    function get_class_namespace(string $nameWithNamespace)
    {
        return rtrim(str_replace(class_basename($nameWithNamespace),"",$nameWithNamespace),"\\");
    }
}