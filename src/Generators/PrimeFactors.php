<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\PrimeFactors as PrimeFactorsIterator;

/**
 * Class PrimeFactors.
 *
 * @package drupol\phpermutations\Generators
 */
class PrimeFactors extends PrimeFactorsIterator
{

  /**
   * Alias of the get() method.
   *
   * @return \Generator
   *   The prime factors generator.
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
   *   The prime factors generator.
   * @codingStandardsIgnoreEnd
   */
    protected function get()
    {
        $number = $this->getNumber();

        for ($i = 2; $i <= $number / $i; $i++) {
            while ($number % $i == 0) {
                yield $i;
                $number /= $i;
            }
        }

        if ($number > 1) {
            yield $number;
        }
    }
}
