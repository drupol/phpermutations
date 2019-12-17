<?php

declare(strict_types=1);

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
    public const TYPE = 'combinations';

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

        self::assertSame($input['dataset'], $combinations->getDataset());
        self::assertSame($input['length'], $combinations->getLength());
        self::assertEquals(
            $expected['dataset'],
            $combinations->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
        self::assertSame($expected['count'], $combinations->count());
    }
}
