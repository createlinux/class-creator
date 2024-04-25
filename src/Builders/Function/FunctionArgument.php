<?php

namespace Createlinux\ClassCreator\Builders\Function;

use Createlinux\ClassCreator\Builders\Basic\DataType;
use Createlinux\ClassCreator\Builders\Collections\DataTypeCollection;

class FunctionArgument
{
    protected string $name = '';
    protected DataTypeCollection $dataType;
    protected $defaultValue = null;

    public function __construct(string $name, $defaultValue = null)
    {

        $this->name = $name;
        $this->dataType = new DataTypeCollection();
        $this->defaultValue = $defaultValue;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDataType(): DataTypeCollection
    {
        return $this->dataType;
    }

    /**
     * @return null
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function getDefaultValuePlain()
    {
        if ($this->dataType->getItems() === 'string') {
            return "'{$this->getDefaultValue()}'";
        }

        return $this->getDefaultValue();
    }

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'dataType' => $this->getDataType(),
            'defaultValue' => $this->getDefaultValue()
        ];
    }


}