<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\Basic\DataType;
use Createlinux\ClassCreator\Builders\ClassBuilder;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class DataTypeCollection extends CollectionAbstract
{
    protected UsingClassCollection $usingClassCollection;

    public function __construct()
    {
        parent::__construct();
        $this->usingClassCollection = new UsingClassCollection();
    }

    public function pushFloat()
    {
        $this->getItems()->put(DataType::float->name, DataType::float);
        return $this;
    }

    public function pushString()
    {
        $this->getItems()->put(DataType::string->name, DataType::string);
        return $this;
    }

    public function pushCallable()
    {
        $this->getItems()->put(DataType::callable->name, DataType::callable);
        return $this;
    }

    public function pushInt()
    {
        $this->getItems()->put(DataType::int->name, DataType::int);
        return $this;
    }

    public function pushNull()
    {
        $this->getItems()->put(DataType::null->name, DataType::null);
        return $this;
    }

    public function pushObject(string $classNameWithNamespace, ?ClassBuilder $parentClassBuilder = null)
    {
        if (!class_exists($classNameWithNamespace)) {
            throw new FileNotFoundException("class " . $classNameWithNamespace . " not found");
        }

        $newClassBuilder = create_class_builder(class_basename($classNameWithNamespace),"");

        $this->getUsingClasses()->put($classNameWithNamespace, $newClassBuilder);

        if ($parentClassBuilder) {
            $parentClassBuilder->pushUsingClass($newClassBuilder);
        }
        $this->getItems()->put(DataType::object->name, $classNameWithNamespace);
        return $this;
    }

    public function hasString()
    {
        return in_array(DataType::string, $this->getItems()->toArray());
    }

    public function hasNull()
    {
        return in_array(DataType::null, $this->getItems()->toArray());
    }

    public function hasInt()
    {
        return in_array(DataType::int, $this->getItems()->toArray());
    }

    public function hasCallback()
    {
        return in_array(DataType::callable, $this->getItems()->toArray());
    }

    public function hasFloat()
    {
        return in_array(DataType::float, $this->getItems()->toArray());
    }

    public function implode()
    {
        /** @var DataType $item */
        $returnTypes = [];
        foreach ($this->getItems() as $type => $item) {
            if ($type !== 'object') {
                $returnTypes[] = $item->name;
            } else {
                $returnTypes[] = basename($item);
            }
        }
        return implode("|", $returnTypes);
    }

    /**
     *
     * 获取引入的类
     * @return UsingClassCollection
     */
    public function getUsingClasses(): UsingClassCollection
    {
        return $this->usingClassCollection;
    }

    public function count()
    {
        return $this->items->count();
    }
}