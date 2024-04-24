<?php

namespace Createlinux\ClassCreator\Builders\Function;

class FunctionArgument
{
    protected string $name = '';
    protected MethodDataType $dataType;
    protected $defaultValue = null;

    public function __construct(string $name, MethodDataType $dataType, $defaultValue)
    {

        $this->name = $name;
        $this->dataType = $dataType;
        $this->defaultValue = $defaultValue;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDataType(): MethodDataType
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
        if ($this->dataType->name === 'string') {
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