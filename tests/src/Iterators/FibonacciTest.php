<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Fibonacci;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FibonacciTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class FibonacciTest extends AbstractTest
{

  /**
   * The type.
   */
    const TYPE = 'fibonacci';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
    public function testFibonacci($input, $expected)
    {
        $prime = new Fibonacci();
        $prime->setMaxLimit(1000);

        $this->assertEquals($expected['count'], $prime->count());
        $this->assertEquals(
            $expected['dataset'],
            $prime->toArray(),
            "\$canonicalize = true",
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
