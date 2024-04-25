<?php

namespace Createlinux\Tests;

use Createlinux\ClassCreator\Builders\Function\FunctionArgument;
use PHPUnit\Framework\TestCase;

class FunctionArgumentTest extends TestCase
{

    protected $argument;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->argument = new FunctionArgument("name", 1);
        $this->argument
            ->getDataType()
            ->pushString()
            ->pushObject(
                create_class_builder("User", "App\\Models", "用户")->getNameWithNamespace()
            );
    }

    public function testName()
    {
        $this->assertEquals("name", $this->argument->getName());
    }

    public function testDefaultValue()
    {
        $this->assertEquals(1, $this->argument->getDefaultValue());
        $this->assertEquals('1', $this->argument->getDefaultValue());
    }

    private function testToArray()
    {
        //TODO 测试toArray
    }
}