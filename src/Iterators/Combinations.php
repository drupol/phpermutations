<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

final class Combinations extends Iterators
{
    private array $c = [];

    public function __construct(array $dataset = [], ?int $length = null)
    {
        parent::__construct(array_values($dataset), $length);
        $this->rewind();
    }

    public function current(): mixed
    {
        return array_map(
            fn(int $index): mixed => $this->dataset[$this->c[$index]],
            range(0, $this->length - 1)
        );
    }

    public function next(): void
    {
        if ($this->nextHelper()) {
            ++$this->key;
        } else {
            $this->key = -1;
        }
    }

    public function rewind(): void
    {
        $this->c = range(0, $this->length);
        $this->key = 0;
    }

    public function valid(): bool
    {
        return 0 <= $this->key;
    }

    private function nextHelper(): bool
    {
        $i = $this->length - 1;

        while (0 <= $i && $this->datasetCount - $this->length + $i === $this->c[$i]) {
            --$i;
        }

        if (0 > $i) {
            return false;
        }

        ++$this->c[$i];

        while ($this->length - 1 > $i++) {
            $this->c[$i] = $this->c[$i - 1] + 1;
        }

        return true;
    }
}
