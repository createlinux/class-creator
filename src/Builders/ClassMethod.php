<?php

namespace Createlinux\ClassCreator\Builders;

use Createlinux\ClassCreator\Builders\Collections\MethodArgumentCollection;
use Illuminate\Support\Str;

class ClassMethod
{
    protected string $name = '';
    protected string $body = '';
    protected array $returnType = [];
    protected MethodArgumentCollection $arguments;

    public function __construct(string $name)
    {

        $this->arguments = new MethodArgumentCollection();
        $this->name = Str::camel($name);
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

    public function getReturnType(): array
    {
        return $this->returnType;
    }
}