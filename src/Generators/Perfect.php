<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Perfect as PerfectIterator;

/**
 * Class Perfect.
 *
 * @package drupol\phpermutations\Generators
 */
class Perfect extends PerfectIterator {

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
    for ($j = 2; $j <= $this->getMaxLimit(); $j++) {
      if ($this->isPerfectNumber($j)) {
        yield $j;
      }
    }
  }

}
