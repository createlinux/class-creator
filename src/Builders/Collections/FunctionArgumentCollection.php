<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\FunctionBuilder;
use Createlinux\ClassCreator\Builders\Function\FunctionArgument;
use Illuminate\Support\Collection;

class FunctionArgumentCollection
{
    /**
     * @var Collection<FunctionArgument>
     */
    protected Collection $items;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function put(FunctionArgument $methodArgument)
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
     * @return Collection<FunctionArgument>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function getOutputPlain()
    {
        $lines = [];
        /** @var FunctionArgument $item */
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