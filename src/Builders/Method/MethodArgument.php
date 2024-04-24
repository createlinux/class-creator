<?php

namespace Createlinux\ClassCreator\Builders\Method;

class MethodArgument
{
    protected string $name = '';
    protected MethodDataType $dataType;
    protected $defaultValue = null;

    public function __construct(string $name,MethodDataType $dataType, $defaultValue)
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

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'dataType' => $this->getDataType(),
            'defaultValue' => $this->getDefaultValue()
        ];
    }

}