<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use const PHP_INT_MAX;

final class Fibonacci extends Iterators
{
    protected $current;

    protected int $max;

    private int $previous = 1;

    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);
        parent::__construct();
    }

    public function getMaxLimit(): int
    {
        return (int) $this->max;
    }

    public function next(): void
    {
        [$this->current, $this->previous] = [$this->current + $this->previous, $this->current];
        ++$this->key;
    }

    public function rewind(): void
    {
        $this->previous = 1;
        $this->current = 0;
        $this->key = 0;
    }

    /**
     * Set the maximum limit.
     */
    public function setMaxLimit(int $max): void
    {
        $this->max = $max;
    }

    public function valid(): bool
    {
        return $this->getMaxLimit() > $this->current;
    }
}
