<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Prime as PrimeIterator;

/**
 * Class Prime.
 */
class Prime extends PrimeIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        for ($j = 2; $this->getMaxLimit() >= $j; ++$j) {
            if ($this->isPrimeNumber($j)) {
                yield $j;
            }
        }
    }
}
