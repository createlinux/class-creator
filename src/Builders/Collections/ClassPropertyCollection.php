<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\ClassProperty;
use Illuminate\Support\Collection;

class ClassPropertyCollection extends CollectionAbstract
{
    /**
     *
     * put属性
     * @param string $name
     * @param ClassProperty $classProperty
     * @return Collection
     */
    public function put(string $name, ClassProperty $classProperty)
    {
        return $this->getItems()->put($name,$classProperty);
    }
}