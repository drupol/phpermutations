<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\FiniteGroup as FiniteGroupIterator;
use Generator;

/**
 * Class FiniteGroup.
 *
 * The finite group is an abelian finite cyclic group.
 */
class FiniteGroup extends FiniteGroupIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        return $this->get();
    }

    /**
     * The generator.
     *
     * @return Generator<int>
     *                    The finite group generator
     */
    protected function get()
    {
        foreach ($this->group as $number) {
            yield $number;
        }
    }
}
