<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Perfect;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PerfectTest.
 *
 * @internal
 * @coversNothing
 */
final class PerfectTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'perfect';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testPerfect($input, $expected)
    {
        $perfect = new Perfect();
        $perfect->setMinLimit($input['min']);
        $perfect->setMaxLimit($input['max']);

        if (2 > $input['min']) {
            $this->assertSame(2, $perfect->getMinLimit());
        } else {
            $this->assertSame($input['min'], $perfect->getMinLimit());
        }
        $this->assertSame($input['max'], $perfect->getMaxLimit());
        $this->assertSame($input['max'], $perfect->getMaxLimit());
        $this->assertSame($expected['count'], $perfect->count());
        $this->assertEquals(
            $expected['dataset'],
            $perfect->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
