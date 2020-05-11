<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Fibonacci as FibonacciIterator;
use Generator;

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
     * @return Generator<int>
     */
    protected function get()
    {
        $a = 0;
        $b = 1;
        $to = $this->getMaxLimit();

        while (0 < $to) {
            yield $a;

            [$a, $b] = [$b, $a + $b];
            --$to;
        }
    }
}
