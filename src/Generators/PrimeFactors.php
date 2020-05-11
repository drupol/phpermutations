<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\PrimeFactors as PrimeFactorsIterator;

class PrimeFactors extends PrimeFactorsIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        $number = $this->getNumber();

        for ($i = 2; $number / $i >= $i; ++$i) {
            while (0 === $number % $i) {
                yield $i;
                $number /= $i;
            }
        }

        if (1 < $number) {
            yield $number;
        }
    }
}
