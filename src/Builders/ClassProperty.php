<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;
use Createlinux\ClassCreator\Builders\Collections\DataTypeCollection;
use Illuminate\Support\Str;

/**
 * @class 类属性
 *
 */
class ClassProperty
{
    //TODO
    private string $name;
    private ?VisibilityIdentify $visibility;

    /**
     * TODO 类型
     * 如果是object类型，则需要调用usingClass引入类，并且在构造函数内初始化类(或者设置该参数为nullable)
     * @var DataTypeCollection
     */
    private DataTypeCollection $dataType;

    private bool $nullable = false;

    public function __construct(string $name, VisibilityIdentify $visibility = null)
    {
        if (!$name) {
            throw new \InvalidArgumentException("参数1不能为空");
        }
        $this->name = Str::camel($name);
        $this->visibility = $visibility;
        $this->dataType = new DataTypeCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVisibility(): ?VisibilityIdentify
    {
        return $this->visibility;
    }

    public function isPublic()
    {
        return $this->visibility->name === 'public';
    }

    public function isPrivate()
    {
        return $this->visibility->name === 'private';
    }

    public function isProtected()
    {
        return $this->visibility->name === 'protected';
    }

    /**
     *
     * 属性数据类型
     * @return DataTypeCollection
     */
    public function getDataType(): DataTypeCollection
    {
        return $this->dataType;
    }

    public function setNullable(bool $nullable): ClassProperty
    {
        $this->nullable = $nullable;
        return $this;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }


}