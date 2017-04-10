<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\PrimeFactors;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PrimeFactorsTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class PrimeFactorsTest extends AbstractTest
{

  /**
   * The type.
   */
    const TYPE = 'primefactors';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
    public function testPrimeFactors($input, $expected)
    {
        $prime = new PrimeFactors();
        $prime->setNumber($input['number']);

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
