<?php

namespace drupol\phpermutations;

/**
 * Class Iterators.
 */
abstract class Iterators extends Combinatorics implements IteratorInterface, \Countable
{
    /**
     * A copy of the dataset at a give time.
     *
     * @var array
     */
    protected $current;

    /**
     * @var int
     */
    protected $key = 0;

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
    public function rewind()
    {
        $this->key = 0;
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
}
