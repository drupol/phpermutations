<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Fibonacci.
 */
class Fibonacci extends Combinatorics implements IteratorInterface
{
    /**
     * The current key.
     *
     * @var int
     */
    protected $key = 0;
    /**
     * The maximum limit.
     *
     * @var int
     */
    protected $max;

    /**
     * The current element.
     *
     * @var int
     */
    private $current = 0;

    /**
     * The previous element.
     *
     * @var int
     */
    private $previous = 1;

    /**
     * Fibonacci constructor.
     */
    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->current;
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
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->getMaxLimit() > $this->current;
    }
}
