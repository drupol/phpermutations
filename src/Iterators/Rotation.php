<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Rotation.
 */
class Rotation extends Combinatorics implements IteratorInterface
{
    /**
     * The key.
     *
     * @var int
     */
    protected $key = 0;

    /**
     * A copy of the original data.
     *
     * @var mixed[]
     */
    protected $rotation;

    /**
     * Rotation constructor.
     *
     * @param array $dataset
     *                       The dataset
     */
    public function __construct(array $dataset = [])
    {
        parent::__construct($dataset, null);
        $this->rotation = $this->getDataset();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->rotation;
    }

    /**
     * Compute the next value of the Iterator.
     *
     * @param int $offset
     *                    The offset
     */
    public function next($offset = 1)
    {
        $offset = (null === $offset) ? 1 : $offset % $this->count();
        $this->rotation = array_merge(array_slice($this->rotation, $offset), array_slice($this->rotation, 0, $offset));
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->rotation = $this->getDataset();
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
