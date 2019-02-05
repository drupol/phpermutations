<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Fibonacci as FibonacciIterator;

/**
 * Class Fibonacci.
 */
class Fibonacci extends FibonacciIterator implements GeneratorInterface
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
     * @codingStandardsIgnoreEnd
     */
    protected function get()
    {
        $a = 0;
        $b = 1;
        $to = $this->getMaxLimit();
        while (0 < $to) {
            yield $a;

            list($a, $b) = [$b, $a + $b];
            --$to;
        }
    }
}
