<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\Function\FunctionArgument;

class FunctionArgumentCollection extends CollectionAbstract
{

    public function put(FunctionArgument $methodArgument)
    {
        $this->items->put($methodArgument->getName(), $methodArgument);
        return $this;
    }

    public function getOutputPlain()
    {
        $lines = [];
        /** @var FunctionArgument $item */
        foreach ($this->getItems() as $item) {

            $argItem = "{$item->getDataType()->implode()} \${$item->getName()}";
            if ($item->getDefaultValue()) {
                $argItem = $argItem . " = {$item->getDefaultValuePlain()}";
            }
            $lines[] = $argItem;
        }
        return implode(", ", $lines);
    }
}