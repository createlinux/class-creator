<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\FunctionBuilder;
use Illuminate\Support\Collection;

class MethodCollection extends CollectionAbstract
{
    protected Collection $items;

    public function put(FunctionBuilder $method)
    {
        $this->items->put($method->getName(), $method);
        return $this;
    }



}