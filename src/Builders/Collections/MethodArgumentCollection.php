<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\ClassMethod;
use Createlinux\ClassCreator\Builders\Method\MethodArgument;
use Illuminate\Support\Collection;

class MethodArgumentCollection
{
    protected Collection $items;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function put(MethodArgument $methodArgument)
    {
        $this->items->put($methodArgument->getName(), $methodArgument);
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