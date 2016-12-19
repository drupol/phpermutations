<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Fibonacci;
use PHPUnit\Framework\TestCase;

/**
 * Class FibonacciTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class FibonacciTest extends TestCase {

  /**
   * @dataProvider simpleValueProvider
   */
  public function testFibonacci($input, $expected) {
    $prime = new Fibonacci();
    $prime->setMaxLimit(1000);

    $this->assertEquals($expected['count'], $prime->count());
    $this->assertEquals($expected['dataset'], $prime->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
  }

  /**
   *
   */
  public function simpleValueProvider() {
    return [
      [
        'input' => [
          'max' => 1000,
        ],
        'output' => [
          'dataset' => [
            0,
            1,
            1,
            2,
            3,
            5,
            8,
            13,
            21,
            34,
            55,
            89,
            144,
            233,
            377,
            610,
            987,
          ],
          'count' => 17,
        ],
      ],
    ];
  }

}
