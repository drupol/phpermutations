<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

/**
 * Class Shift.
 */
class Shift extends Iterators
{
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
    public function count()
    {
        return \count($this->getDataset());
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
     * Internal function to do the shift.
     *
     * @param int $length
     */
    protected function doShift($length = 1)
    {
        $parameters = [];

        if (0 > $length) {
            $parameters[] = ['start' => \abs($length), 'end' => null];
            $parameters[] = ['start' => 0, 'end' => \abs($length)];
        } else {
            $parameters[] = ['start' => -1 * $length, 'end' => null];
            $parameters[] = ['start' => 0, 'end' => $this->datasetCount + $length * -1];
        }

        $this->current = \array_merge(
            \array_slice($this->current, $parameters[0]['start'], $parameters[0]['end']),
            \array_slice($this->current, $parameters[1]['start'], $parameters[1]['end'])
        );
    }
}
