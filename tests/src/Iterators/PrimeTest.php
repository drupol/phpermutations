<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Prime;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PrimeTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class PrimeTest extends AbstractTest {

  /**
   * The type.
   */
  const TYPE = 'prime';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
  public function testPrime($input, $expected) {
    $prime = new Prime();
    $prime->setMinLimit($input['min']);
    $prime->setMaxLimit($input['max']);

    if ($input['min'] < 2) {
      $this->assertEquals(2, $prime->getMinLimit());
    }
    else {
      $this->assertEquals($input['min'], $prime->getMinLimit());
    }
    $this->assertEquals($input['max'], $prime->getMaxLimit());
    $this->assertEquals($expected['count'], $prime->count());
    $this->assertEquals($expected['dataset'], $prime->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
  }

}
