<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Shift as ShiftIterator;

/**
 * Class Shift.
 */
class Shift extends ShiftIterator
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        while (true) {
            $this->next();
            yield $this->current();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [];
    }
}
