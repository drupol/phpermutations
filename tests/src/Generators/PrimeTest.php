<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Prime;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PrimeTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\Prime
 */
final class PrimeTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'prime';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testPrime($input, $expected)
    {
        $prime = new Prime();
        $prime->setMinLimit($input['min']);
        $prime->setMaxLimit($input['max']);

        if (2 > $input['min']) {
            static::assertSame(2, $prime->getMinLimit());
        } else {
            static::assertSame($input['min'], $prime->getMinLimit());
        }
        static::assertSame($input['max'], $prime->getMaxLimit());

        static::assertSame($expected['count'], $prime->count());
        static::assertEquals(
            $expected['dataset'],
            $prime->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
