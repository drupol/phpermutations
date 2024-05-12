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
    public function generator(): Generator
    {
        return $this->get();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * Get the generator.
     *
     * @return Generator<int>
     *                    The generator
     */
    protected function get(): Generator
    {
        while (true) {
            $this->next();

            yield $this->current();
        }
    }
}
