<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Fibonacci as FibonacciIterator;

/**
 * Class Fibonacci.
 *
 * @package drupol\phpermutations\Generators
 */
class Fibonacci extends FibonacciIterator {

  /**
   * @var int
   */
  protected $max;

  /**
   * @return \Generator
   */
  public function generator() {
    return $this->get();
  }

  /**
   * @return \Generator
   */
  protected function get() {
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
