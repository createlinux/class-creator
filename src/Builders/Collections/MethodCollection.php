<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\ClassMethod;
use Illuminate\Support\Collection;

class MethodCollection
{
    protected Collection $items;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function put(ClassMethod $method)
    {
        $this->items->put($method->getName(), $method);
        return $this;
    }

    public function toArray()
    {
        $list = [];
        foreach ($this->items as $item) {
            $list[] = $item->toArray();
        }
        return $list;
    }
}