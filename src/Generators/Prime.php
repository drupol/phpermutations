<?php

declare(strict_types = 1);

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
        return $this->get();
    }

    /**
     * The generator.
     *
     * @codingStandardsIgnoreStart
     *
     * @return \Generator
     *                    The prime generator
     * @codingStandardsIgnoreEnd
     */
    protected function get()
    {
        for ($j = 2; $this->getMaxLimit() >= $j; ++$j) {
            if ($this->isPrimeNumber($j)) {
                yield $j;
            }
        }
    }
}
