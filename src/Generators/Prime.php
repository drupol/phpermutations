<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Prime as PrimeIterator;

/**
 * Class Prime.
 *
 * @package drupol\phpermutations\Generators
 */
class Prime extends PrimeIterator {

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
    for ($j = 2; $j <= $this->getMaxLimit(); $j++) {
      if ($this->isPrimeNumber($j)) {
        yield $j;
      }
    }
  }

}
