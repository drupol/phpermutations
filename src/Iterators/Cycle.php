<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Cycle.
 */
class Cycle extends Combinatorics implements \Iterator, \Countable
{
    /**
     * The key.
     *
     * @var int
     */
    protected $key = 0;

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
    public function current()
    {
        return $this->dataset[$this->key];
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->key = ($this->key + 1) % $this->datasetCount;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->key = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->getDataset());
    }
}
