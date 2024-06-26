<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;
use Createlinux\ClassCreator\Builders\Collections\DataTypeCollection;
use Createlinux\ClassCreator\Builders\Collections\FunctionArgumentCollection;
use Createlinux\ClassCreator\Builders\Collections\UsingClassCollection;
use Createlinux\ClassCreator\Builders\Function\FunctionArgument;
use Illuminate\Support\Str;

/**
 * @class 类方法或者函数构造器
 *
 */
class FunctionBuilder
{
    protected string $name = '';
    protected string $body = "{\n    }";
    protected DataTypeCollection $returnType;
    protected FunctionArgumentCollection $arguments;
    private ?VisibilityIdentify $visibilityIdentify;
    protected UsingClassCollection $usingClasses;

    public function __construct(string $name, VisibilityIdentify $visibility = null)
    {

        $this->arguments = new FunctionArgumentCollection();
        $this->name = Str::camel($name);
        $this->visibilityIdentify = $visibility;
        $this->returnType = new DataTypeCollection();
        $this->usingClasses = new UsingClassCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'arguments' => $this->getArguments()->toArray(),
            'body' => $this->getBody(),
            'returnType' => $this->getReturnType()
        ];
    }

    public function getArguments(): FunctionArgumentCollection
    {
        return $this->arguments;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    /**
     *
     * 获取方法的纯文本
     * @return string
     */
    public function getOutputPlainText(): string
    {
        //
        $identify = $this->getVisibilityIdentify() ? "    " . $this->getVisibilityIdentify()->name . " " : '';

        $returnDataType = $this->getReturnType()->count() ? " : {$this->getReturnType()->implode()}" : "";
        return "
{$identify}function {$this->getName()}({$this->getArguments()->getOutputPlain()}){$returnDataType}
    {$this->getBody()}";
    }

    public function getReturnType(): DataTypeCollection
    {
        return $this->returnType;
    }

    public function getVisibilityIdentify(): VisibilityIdentify|null
    {
        return $this->visibilityIdentify;
    }

    /**
     *
     * 设置方法体，不包含{}
     * @param string $body
     * @return $this
     */
    public function setBody(string $body): FunctionBuilder
    {
        $this->body = "{    \n{$body}  \n   }";
        return $this;
    }

    public function getUsingClasses(): UsingClassCollection
    {
        return $this->usingClasses;
    }

    /**
     *
     * 创建参数
     * @param string $name
     * @param $defaultValue
     * @return FunctionArgument
     */
    public function createArgument(string $name, $defaultValue = null)
    {
        $argument = new FunctionArgument($name, $defaultValue);
        $this->getArguments()->put($argument);
        return $argument;
    }
}