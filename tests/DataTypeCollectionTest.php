<?php

namespace Createlinux\Tests;

use Createlinux\ClassCreator\Builders\Collections\DataTypeCollection;
use PHPUnit\Framework\TestCase;


class DataTypeCollectionTest extends TestCase
{
    private DataTypeCollection $dataTypeCollection;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->dataTypeCollection = new DataTypeCollection();
    }

    public function testNull()
    {
        $this->dataTypeCollection->pushNull();
        $this->dataTypeCollection->pushNull();
        $this->assertEquals('null', $this->dataTypeCollection->implode());
        $this->dataTypeCollection->pushInt();
        $this->assertEquals('null|int', $this->dataTypeCollection->implode());
    }


    public function testHasString()
    {
        $this->dataTypeCollection->pushString();
        $this->assertEquals(true, $this->dataTypeCollection->hasString());
    }

    public function testGetItems()
    {
        $this->assertEquals([], $this->dataTypeCollection->getItems()->toArray());
        $this->dataTypeCollection->pushInt();
        $this->dataTypeCollection->pushCallable();
        $this->dataTypeCollection->pushString();
        $this->dataTypeCollection->pushObject("App\\Models\\User");

        $this->assertEquals('int|callable|string|User', $this->dataTypeCollection->implode());
    }

    public function testHasCallable()
    {
        $this->assertEquals(false, $this->dataTypeCollection->hasString());
    }

    public function testHasInt()
    {
        $this->dataTypeCollection->pushInt();
        $this->assertEquals(true, $this->dataTypeCollection->hasInt());
    }

    public function testHasObject()
    {
        $this->dataTypeCollection->pushObject("App\\Models\\User");
        $this->assertEquals(true, $this->dataTypeCollection->hasObject());
    }

    public function testGetUsingClass()
    {
        $this->dataTypeCollection->pushObject("App\\Models\\User");
        $this->assertEquals(1,$this->dataTypeCollection->getUsingClasses()->getItems()->count());
    }

}