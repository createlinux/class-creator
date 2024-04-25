<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;

/**
 * @class 类属性
 *
 */
class ClassProperty
{
    //TODO
    private string $name;
    private ?VisibilityIdentify $visibility;
    //TODO 类型

    public function __construct(string $name, VisibilityIdentify $visibility = null)
    {

        $this->name = $name;
        $this->visibility = $visibility;
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
}