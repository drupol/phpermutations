<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Perfect;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PerfectTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Iterators\Perfect
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
            static::assertSame(2, $perfect->getMinLimit());
        } else {
            static::assertSame($input['min'], $perfect->getMinLimit());
        }
        static::assertSame($input['max'], $perfect->getMaxLimit());
        static::assertSame($input['max'], $perfect->getMaxLimit());
        static::assertSame($expected['count'], $perfect->count());
        static::assertEquals(
            $expected['dataset'],
            $perfect->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
