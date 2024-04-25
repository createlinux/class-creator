<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;
use Createlinux\ClassCreator\Builders\Collections\ClassPropertyCollection;
use Createlinux\ClassCreator\Builders\Collections\MethodCollection;
use Createlinux\ClassCreator\Builders\Collections\UsingClassCollection;
use Illuminate\Support\Str;

/**
 * @class 类构造器
 *
 */
class ClassBuilder
{
    protected string $name = '';
    protected string $label = '';
    protected string $namespace = '';

    /**
     * @var array 引入的类
     */
    protected UsingClassCollection $usingClasses;

    /**
     * @var string 继承的类
     */
    protected ?ClassBuilder $extend = null;

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
    public function __construct(string $name, string $namespace, string $label = '')
    {
        $name = to_singular_name($name);
        $this->name = Str::studly($name);
        $this->label = $label;

        $this->methods = new MethodCollection();
        $this->usingClasses = new UsingClassCollection();
        $this->properties = new ClassPropertyCollection();
        $this->namespace = $namespace;
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

    public function isAbstract(): bool
    {
        return $this->isAbstract;
    }

    public function setIsAbstract(bool $isAbstract): void
    {
        $this->isAbstract = $isAbstract;
    }

    public function getUsingClasses(): UsingClassCollection
    {
        return $this->usingClasses;
    }

    public function createMethod(string $name, $functionIdentify = VisibilityIdentify::public)
    {
        $functionBuilder = new FunctionBuilder($name, $functionIdentify);
        $this->getMethods()->put($functionBuilder);
        return $functionBuilder;
    }

    /**
     *
     * @return MethodCollection<FunctionBuilder>
     */
    public function getMethods(): MethodCollection
    {
        return $this->methods;
    }

    public function getOutputPlainText()
    {
        /**
         * 命名空间
         */
        $namespace = $this->getNamespace() ? "namespace {$this->getNamespace()};" : "";
        /**
         * 继承的类
         */
        $extendClass = $this->getExtend()->getName() ? "extends {$this->getExtend()->getName()}" : '';
        /**
         * 引入的类
         */
        $usingClasses = $this->getUsingClasses()->getOutputPlainText();

        /**
         * 方法纯文本
         */
        $methods = $this->getMethods()->getOutputPlainText();

        $classFileContent = <<<CLASS
$namespace
$usingClasses
/**
* @class {$this->getLabel()}
*
*/
class {$this->getName()} $extendClass
{
    $methods
}
CLASS;

        return $classFileContent;
    }

    public function setExtend(?ClassBuilder $classBuilder): ClassBuilder
    {
        $this->extend = $classBuilder;
        $this->getUsingClasses()->put($classBuilder->getNameWithNamespace(), $classBuilder);
        return $this;
    }

    public function getExtend(): ?ClassBuilder
    {
        return $this->extend;
    }

    /**
     *
     * push引入的类
     * @param ClassBuilder $classBuilder
     * @return $this
     */
    public function pushUsingClass(ClassBuilder $classBuilder)
    {
        //TODO 这里的name值携带namespace
        $this->getUsingClasses()->put($classBuilder->getNameWithNamespace(), $classBuilder);
        return $this;
    }

    public function getNameWithNamespace()
    {
        return $this->getNamespace() . "\\" . $this->getName();
    }

    public function addProperty()
    {
        //TODO 添加
    }

    public function getProperties(): ClassPropertyCollection
    {
        return $this->properties;
    }


}