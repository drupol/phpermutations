<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Shift as ShiftIterator;

class Shift extends ShiftIterator implements GeneratorInterface
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
