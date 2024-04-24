<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Collections\FunctionArgumentCollection;
use Createlinux\ClassCreator\Builders\Function\FunctionArgument;
use Createlinux\ClassCreator\Builders\Function\FunctionIdentify;
use Illuminate\Support\Str;

class FunctionBuilder
{
    protected string $name = '';
    protected string $body = "{\n}";
    protected array $returnType = [];
    protected FunctionArgumentCollection $arguments;
    private ?FunctionIdentify $identify;

    public function __construct(string $name, FunctionIdentify $identify = null)
    {

        $this->arguments = new FunctionArgumentCollection();
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
    public function getOutputPlainText()
    {
        //
        $identify = $this->getIdentify() ? $this->getIdentify()->name." " : '';

        /** @var FunctionArgument $argument */


        $method = <<<BODY
{$identify}function {$this->getName()}({$this->getArguments()->getOutputPlain()})
{$this->getBody()}
BODY;
        return $method;
    }

    public function getReturnType(): array
    {
        return $this->returnType;
    }

    public function getIdentify(): FunctionIdentify|null
    {
        return $this->identify;
    }

    /**
     *
     * 设置方法体，不包含{}
     * @param string $body
     * @return $this
     */
    public function setBody(string $body): FunctionBuilder
    {
        $this->body = "{\n{$body}\n}";
        return $this;
    }
}