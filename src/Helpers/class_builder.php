<?php

use \Createlinux\ClassCreator\Builders\ClassBuilder;

if (!function_exists('create_class_builder')) {
    function create_class_builder(string $name, string $label = '')
    {
        return new ClassBuilder($name, $label);
    }
}