<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Perfect;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PerfectTest.
 *
 * @package drupol\phpermutations\Tests\Generators
 *
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
     * @param mixed $input
     * @param mixed $expected
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
