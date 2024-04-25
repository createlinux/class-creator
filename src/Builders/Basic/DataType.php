<?php

namespace Createlinux\ClassCreator\Builders\Basic;

enum DataType
{
    case bool;
    case resource;
    case double;
    case null;
    case array;
    case int;
    case float;
    case string;
    case callable;
    case object;
}