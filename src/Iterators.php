<?php

declare(strict_types=1);

namespace drupol\phpermutations;

use Countable;
use Iterator;

abstract class Iterators extends Combinatorics implements Iterator
{
    /**
     * A copy of the dataset at a give time.
     *
     * @var array<int, mixed>
     */
    protected $current;

    protected int $key = 0;

    /**
     * {@inheritdoc}
     */
    public function current(): mixed
    {
        return $this->current;
    }

    /**
     * {@inheritdoc}
     */
    public function key(): int
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->key = 0;
    }
}
