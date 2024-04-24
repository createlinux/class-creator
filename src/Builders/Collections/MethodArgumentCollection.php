<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\ClassMethod;
use Createlinux\ClassCreator\Builders\Method\MethodArgument;
use Illuminate\Support\Collection;

class MethodArgumentCollection
{
    /**
     * @var Collection<MethodArgument>
     */
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

    /**
     *
     *
     * @return Collection<MethodArgument>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function getOutputPlain()
    {
        $lines = [];
        /** @var MethodArgument $item */
        foreach ($this->getItems() as $item) {
            $argItem = "{$item->getDataType()->name} \${$item->getName()}";
            if ($item->getDefaultValue()) {
                $argItem = $argItem . "= {$item->getDefaultValuePlain()}";
            }
            $lines[] = $argItem;
        }
        return implode(", ", $lines);
    }
}