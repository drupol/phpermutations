<?php

declare(strict_types=1);

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
    public const TYPE = 'prime';

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
            self::assertSame(2, $prime->getMinLimit());
        } else {
            self::assertSame($input['min'], $prime->getMinLimit());
        }
        self::assertSame($input['max'], $prime->getMaxLimit());

        self::assertSame($expected['count'], $prime->count());
        self::assertEquals(
            $expected['dataset'],
            $prime->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
