<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Perfect;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PerfectTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class PerfectTest extends AbstractTest
{

  /**
   * The type.
   */
    const TYPE = 'perfect';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
    public function testPerfect($input, $expected)
    {
        $perfect = new Perfect();
        $perfect->setMinLimit($input['min']);
        $perfect->setMaxLimit($input['max']);

        if ($input['min'] < 2) {
            $this->assertEquals(2, $perfect->getMinLimit());
        } else {
            $this->assertEquals($input['min'], $perfect->getMinLimit());
        }
        $this->assertEquals($input['max'], $perfect->getMaxLimit());
        $this->assertEquals($input['max'], $perfect->getMaxLimit());
        $this->assertEquals($expected['count'], $perfect->count());
        $this->assertEquals(
            $expected['dataset'],
            $perfect->toArray(),
            "\$canonicalize = true",
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
