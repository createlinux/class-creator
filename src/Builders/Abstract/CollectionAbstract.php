<?php

namespace Createlinux\ClassCreator\Builders\Abstract;

use Illuminate\Support\Collection;
use Traversable;

abstract class CollectionAbstract implements \IteratorAggregate
{
    /**
     * @var Collection
     */
    protected Collection $items;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function getIterator(): Traversable
    {
        return $this->items->getIterator();
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function toArray(): array
    {
        $list = [];
        foreach ($this->items as $item) {
            $list[] = $item->toArray();
        }
        return $list;
    }
}