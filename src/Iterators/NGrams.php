<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

final class NGrams extends Iterators
{
    private Shift $shift;

    protected $length;

    public function __construct(array $dataset = [], int $length = 1)
    {
        $this->shift = new Shift($dataset, $length);
        $this->length = $length;
    }

    public function getDataset(): array
    {
        return $this->shift->getDataset();
    }

    public function current(): mixed
    {
        return array_slice($this->shift->current(), 0, $this->length);
    }

    public function next(): void
    {
        $this->shift->next();
    }

    public function rewind(): void
    {
        $this->shift->rewind();
    }

    public function valid(): bool
    {
        return $this->shift->valid();
    }
}
