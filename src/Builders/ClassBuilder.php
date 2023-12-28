<?php

namespace Createlinux\ClassCreator\Builders;

class ClassBuilder
{
    protected string $name = '';
    protected string $label = '';
    protected string $namespace = '';

    /**
     * @var array 引入的类
     */
    protected array $usingClasses = [];

    /**
     * @var string 依赖的类
     */
    protected ?ClassBuilder $extends = null;

    /**
     * @var array 依赖的接口
     */
    protected array $implements = [];

    protected bool $isAbstract = false;

    /**
     * @var array<\MethodItem> 方法
     */
    protected array $methods = [];

    /**
     * @param string $name 类名称，大驼峰命名
     * @param string $label 类中文标签
     */
    public function __construct(string $name, string $label = '')
    {
        $this->name = $name;
        $this->label = $label;
    }

    public function getFileContent()
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): void
    {
        $this->namespace = $namespace;
    }

    public function isAbstract(): bool
    {
        return $this->isAbstract;
    }

    public function setIsAbstract(bool $isAbstract): void
    {
        $this->isAbstract = $isAbstract;
    }

}