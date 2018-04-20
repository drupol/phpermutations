<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Shift.
 */
class Shift extends Combinatorics implements IteratorInterface
{
    /**
     * The key.
     *
     * @var int
     */
    protected $key = 0;

    /**
     * A copy of the dataset at a give time.
     *
     * @var array
     */
    protected $current;

    /**
     * Shift constructor.
     *
     * @param array $dataset
     *                       The dataset
     * @param int   $length
     *                       The shift length
     */
    public function __construct(array $dataset = [], $length = 1)
    {
        parent::__construct($dataset, $length);
        $this->current = $this->getDataset();
    }

    /**
     * {@inheritdoc}
     */
    public function setLength($length = null)
    {
        $length = (null === $length) ? $this->datasetCount : $length;
        $this->length = (abs($length) > $this->datasetCount) ? $this->datasetCount : $length;

        return $this;
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
        $this->doShift(1);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->doShift(-1);
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

    /**
     * Internal function to do the shift.
     *
     * @param int $length
     */
    protected function doShift($length = 1)
    {
        $parameters = [];

        if ($length < 0) {
            $parameters[] = ['start' => abs($length), 'end' => null];
            $parameters[] = ['start' => 0, 'end' => abs($length)];
        } else {
            $parameters[] = ['start' => -1 * $length, 'end' => null];
            $parameters[] = ['start' => 0, 'end' => $this->datasetCount + $length * -1];
        }

        $this->current = array_merge(
            array_slice($this->current, $parameters[0]['start'], $parameters[0]['end']),
            array_slice($this->current, $parameters[1]['start'], $parameters[1]['end'])
        );
    }
}
