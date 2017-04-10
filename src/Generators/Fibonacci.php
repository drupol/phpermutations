<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Fibonacci as FibonacciIterator;

/**
 * Class Fibonacci.
 *
 * @package drupol\phpermutations\Generators
 */
class Fibonacci extends FibonacciIterator
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
        $a = 0;
        $b = 1;
        $to = $this->getMaxLimit();
        while ($to > 0) {
            yield $a;

            list($a, $b) = array($b, $a + $b);
            $to--;
        }
    }
}
