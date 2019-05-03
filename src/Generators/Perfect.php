<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Perfect as PerfectIterator;

/**
 * Class Perfect.
 */
class Perfect extends PerfectIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        for ($j = 2; $this->getMaxLimit() >= $j; ++$j) {
            if ($this->isPerfectNumber($j)) {
                yield $j;
            }
        }
    }
}
