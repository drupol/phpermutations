<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use function array_slice;
use function count;

class Rotation extends Iterators
{
    /**
     * A copy of the original data.
     *
     * @var mixed[]
     */
    protected $rotation;

    /**
     * Rotation constructor.
     *
     * @param array<int, mixed> $dataset
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
    public function count()
    {
        return count($this->getDataset());
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
     * @param int|null $offset
     *                    The offset
     *
     * @return void
     */
    public function next($offset = 1)
    {
        $offset = (null === $offset) ? 1 : $offset % $this->count();
        $this->rotation = array_merge(
            array_slice(
                $this->rotation,
                $offset
            ),
            array_slice(
                $this->rotation,
                0,
                $offset
            )
        );
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
     *
     * @return bool
     */
    public function valid()
    {
        return true;
    }
}
