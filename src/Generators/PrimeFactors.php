<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\PrimeFactors as PrimeFactorsIterator;

/**
 * Class PrimeFactors.
 */
class PrimeFactors extends PrimeFactorsIterator implements GeneratorInterface
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
     *                    The prime factors generator
     * @codingStandardsIgnoreEnd
     */
    protected function get()
    {
        $number = $this->getNumber();

        for ($i = 2; $i <= $number / $i; ++$i) {
            while (0 === $number % $i) {
                yield $i;
                $number /= $i;
            }
        }

        if ($number > 1) {
            yield $number;
        }
    }
}
