<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Perfect;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PerfectTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\Perfect
 */
final class PerfectTest extends AbstractTest
{
    /**
     * The type.
     */
    public const TYPE = 'perfect';

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
            self::assertSame(2, $perfect->getMinLimit());
        } else {
            self::assertSame($input['min'], $perfect->getMinLimit());
        }
        self::assertSame($input['max'], $perfect->getMaxLimit());
        self::assertSame($expected['count'], $perfect->count());
        self::assertEquals(
            $expected['dataset'],
            $perfect->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
