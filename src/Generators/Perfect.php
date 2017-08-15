<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Perfect as PerfectIterator;

/**
 * Class Perfect.
 *
 * @package drupol\phpermutations\Generators
 */
class Perfect extends PerfectIterator
{
    /**
     * The maximum value.
     *
     * @var int
     */
    protected $max;

    /**
     * Alias of the get() method.
     *
     * @return \Generator
     *   The prime generator.
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
     * @codingStandardsIgnoreEnd
     */
    protected function get()
    {
        for ($j = 2; $j <= $this->getMaxLimit(); $j++) {
            if ($this->isPerfectNumber($j)) {
                yield $j;
            }
        }
    }
}
