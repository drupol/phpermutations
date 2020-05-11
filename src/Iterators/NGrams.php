<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use function array_slice;

class NGrams extends Shift
{
    /**
     * @var mixed
     */
    protected $currentValue;

    /**
     * NGrams constructor.
     *
     * @param array<int, mixed> $dataset
     *                       The dataset
     * @param int   $length
     *                       The shift length
     */
    public function __construct(array $dataset = [], $length = 1)
    {
        parent::__construct($dataset, $length);

        $this->currentValue = array_slice(
            $this->getDataset(),
            0,
            $length
        );
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->currentValue;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function next()
    {
        parent::next();
        $this->currentValue = array_slice($this->current, 0, $this->getLength());
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function rewind()
    {
        parent::rewind();
        $this->currentValue = array_slice($this->current, 0, $this->getLength());
    }
}
