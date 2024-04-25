<?php

namespace Createlinux\ClassCreator\Builders\Collections;

use Createlinux\ClassCreator\Builders\Abstract\CollectionAbstract;
use Createlinux\ClassCreator\Builders\ClassBuilder;

class UsingClassCollection extends CollectionAbstract
{
    public function put($key,ClassBuilder $value)
    {
        $this->getItems()->put($key, $value);
        return $this;
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