<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Combinations;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PermutationsTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\Combinations
 */
final class CombinationsTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'combinations';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testCombinationsClass($input, $expected)
    {
        $combinations = new Combinations($input['dataset'], $input['length']);

        static::assertSame($input['dataset'], $combinations->getDataset());
        static::assertSame($input['length'], $combinations->getLength());
        static::assertEquals(
            $expected['dataset'],
            $combinations->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
        static::assertSame($expected['count'], $combinations->count());
    }
}
