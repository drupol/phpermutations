<?php

namespace drupol\phpermutations\Iterators;

/**
 * Class NGrams.
 */
class NGrams extends Shift implements \Iterator, \Countable
{
    /**
     * @var
     */
    protected $currentValue;

    /**
     * NGrams constructor.
     *
     * @param array $dataset
     *                       The dataset
     * @param int   $length
     *                       The shift length
     */
    public function __construct(array $dataset = [], $length = 1)
    {
        parent::__construct($dataset, $length);
        $this->currentValue = array_slice(($this->getDataset()), 0, $length);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        parent::next();
        $this->currentValue = array_slice($this->current, 0, $this->getLength());
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        parent::rewind();
        $this->currentValue = array_slice($this->current, 0, $this->getLength());
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->currentValue;
    }
}
