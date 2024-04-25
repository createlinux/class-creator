<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\ClassBuilder;
use Createlinux\ClassCreator\Builders\FunctionBuilder;
use Illuminate\Support\Collection;

class MethodCollection extends CollectionAbstract
{
    /**
     * @var Collection<FunctionBuilder>
     */
    protected Collection $items;

    public function put(FunctionBuilder $method)
    {
        $this->items->put($method->getName(), $method);
        return $this;
    }

    public function getOutputPlainText()
    {
        $lines = [];
        /** @var FunctionBuilder $function */
        foreach ($this->getItems() as $function) {
            $lines[] = "{$function->getOutputPlainText()}\n";
        }
        return implode("",$lines);
    }


}