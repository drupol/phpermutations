<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\FiniteGroup as FiniteGroupIterator;

/**
 * Class FiniteGroup.
 *
 * The finite group is an abelian finite cyclic group.
 *
 * @package drupol\phpermutations\Generators
 */
class FiniteGroup extends FiniteGroupIterator
{

  /**
   * Alias of the get() method.
   *
   * @return \Generator
   *   The finite group generator.
   */
    public function generator()
    {
        return $this->get();
    }

  /**
   * The generator.
   *
   * @codingStandardsIgnoreStart
   * @return \Generator
   *   The finite group generator.
   * @codingStandardsIgnoreEnd
   */
    protected function get()
    {
        foreach ($this->group as $number) {
            yield $number;
        }
    }
}
