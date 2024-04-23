<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Collections\ClassPropertyCollection;
use Createlinux\ClassCreator\Builders\Collections\ClassUsingCollection;
use Createlinux\ClassCreator\Builders\Collections\MethodCollection;
use Illuminate\Support\Str;

class ClassBuilder
{
    protected string $name = '';
    protected string $label = '';
    protected string $namespace = '';

    /**
     * @var array 引入的类
     */
    protected ClassUsingCollection $usingClasses;

    /**
     * @var string 继承的类
     */
    protected ?ClassBuilder $extends = null;

    /**
     * @var array 依赖的接口
     */
    protected array $implements = [];

    protected bool $isAbstract = false;

    /**
     * @var MethodCollection 方法
     */
    protected MethodCollection $methods;
    /**
     * @var array 属性
     */
    protected ClassPropertyCollection $properties;

    /**
     * @param string $name 类名称，大驼峰命名
     * @param string $label 类中文标签
     */
    public function __construct(string $name, string $label = '')
    {
        $name = to_singular_name($name);
        $this->name = Str::studly($name);
        $this->label = $label;

        $this->methods = new MethodCollection();
        $this->usingClasses = new ClassUsingCollection();
        $this->properties = new ClassPropertyCollection();
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

    public function getUsingClasses(): array
    {
        return $this->usingClasses;
    }

    public function getMethods(): MethodCollection
    {
        return $this->methods;
    }


}