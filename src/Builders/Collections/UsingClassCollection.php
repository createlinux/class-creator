<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\ClassBuilder;

class UsingClassCollection extends CollectionAbstract
{
    public function put(string $nameWithNamespace, ClassBuilder $value)
    {
        $this->getItems()->put($nameWithNamespace, $value);
        return $this;
    }

    public function count()
    {
        return $this->getItems()->count();
    }

    /**
     *
     *
     * @return array
     */
    public function toArray(): array
    {

        return $this->getItems()->values()->toArray();
    }

    public function getOutputPlainText()
    {
        if (!$this->getItems()->count()) {
            return "";
        }

        $outputLines = [];
        /** @var ClassBuilder $item */
        foreach ($this->getItems() as $item) {
            $outputLines[] = "use " . $item->getNameWithNamespace() . ";";
        }
        return "\n" . implode("\n", $outputLines) . "\n";
    }
}