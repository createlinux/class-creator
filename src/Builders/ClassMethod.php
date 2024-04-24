<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Collections\MethodArgumentCollection;
use Createlinux\ClassCreator\Builders\Method\MethodArgument;
use Createlinux\ClassCreator\Builders\Method\MethodIdentify;
use Illuminate\Support\Str;

class ClassMethod
{
    protected string $name = '';
    protected string $body = "{\n}";
    protected array $returnType = [];
    protected MethodArgumentCollection $arguments;
    private MethodIdentify $identify;

    public function __construct(string $name, MethodIdentify $identify)
    {

        $this->arguments = new MethodArgumentCollection();
        $this->name = Str::camel($name);
        $this->identify = $identify;
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

    public function getArguments(): MethodArgumentCollection
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
    public function getOutputPlainText()
    {
        //
        $identify = $this->getIdentify()->name;

        /** @var MethodArgument $argument */


        $method = <<<BODY
$identify function {$this->getName()}({$this->getArguments()->getOutputPlain()})
{$this->getBody()}
BODY;
        return $method;
    }

    public function getReturnType(): array
    {
        return $this->returnType;
    }

    public function getIdentify(): MethodIdentify
    {
        return $this->identify;
    }

    /**
     *
     * 设置方法体，不包含{}
     * @param string $body
     * @return $this
     */
    public function setBody(string $body): ClassMethod
    {
        $this->body = "{\n{$body}\n}";
        return $this;
    }
}