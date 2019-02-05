<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Cycle.
 */
class Cycle extends Combinatorics implements IteratorInterface
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
    public function count()
    {
        return \count($this->getDataset());
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
}
