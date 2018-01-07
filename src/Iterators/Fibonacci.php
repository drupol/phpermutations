<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Fibonacci.
 */
class Fibonacci extends Combinatorics implements \Iterator, \Countable
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
    public function key()
    {
        return $this->key;
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
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->toArray());
    }

    /**
     * Convert the iterator into an array.
     *
     * @return array
     *               The elements
     */
    public function toArray()
    {
        $data = [];

        for ($this->rewind(); $this->valid(); $this->next()) {
            $data[] = $this->current();
        }

        return $data;
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
        return intval($this->max);
    }
}
