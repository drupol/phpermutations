<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Shift as ShiftIterator;

/**
 * Class Shift.
 */
class Shift extends ShiftIterator
{
    /**
     * Get the generator.
     *
     * @return \Generator
     *                    The generator
     */
    public function generator()
    {
        return $this->get();
    }

    /**
     * Get the generator.
     *
     * @codingStandardsIgnoreStart
     *
     * @return \Generator
     *                    The generator
     * @codingStandardsIgnoreEnd
     */
    protected function get()
    {
        while (true) {
            $this->next();
            yield $this->current();
        }
    }
}
