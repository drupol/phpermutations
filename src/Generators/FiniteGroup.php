<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\FiniteGroup as FiniteGroupIterator;

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
     * @codingStandardsIgnoreStart
     *
     * @return \Generator
     *                    The finite group generator
     * @codingStandardsIgnoreEnd
     */
    protected function get()
    {
        foreach ($this->group as $number) {
            yield $number;
        }
    }
}
