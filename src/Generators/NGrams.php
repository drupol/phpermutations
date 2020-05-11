<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\NGrams as NGramsIterator;
use Generator;

class NGrams extends NGramsIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        return $this->get();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [];
    }

    /**
     * Get the generator.
     *
     * @return Generator<int>
     *                    The generator
     */
    protected function get()
    {
        while (true) {
            $this->next();

            yield $this->current();
        }
    }
}
