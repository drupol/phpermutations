<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Fibonacci.
 */
class Fibonacci extends Combinatorics implements IteratorInterface
{
    /**
     * The maximum limit.
     *
     * @var int
     */
    protected $max;

    /**
     * The previous element.
     *
     * @var int
     */
    private $previous = 1;

    /**
     * The current element.
     *
     * @var int
     */
    private $current = 0;

    /**
     * The current key.
     *
     * @var int
     */
    private $key = 0;

    /**
     * Fibonacci constructor.
     */
    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);
        parent::__construct([], null);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        list($this->current, $this->previous) = [$this->current + $this->previous, $this->current];
        ++$this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->previous = 1;
        $this->current = 0;
        $this->key = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->current < $this->getMaxLimit();
    }

    /**
     * Set the maximum limit.
     *
     * @param int $max
     *                 The limit
     */
    public function setMaxLimit($max)
    {
        $this->max = $max;
    }

    /**
     * Get the maximum limit.
     *
     * @return int
     *             The limit
     */
    public function getMaxLimit()
    {
        return (int) $this->max;
    }
}
