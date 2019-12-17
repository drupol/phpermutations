<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Combinations;
use drupol\phpermutations\Tests\AbstractTest;
use function count;

/**
 * Class CombinationsTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Iterators\Combinations
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
    public function testCombinations($input, $expected)
    {
        $combinations = new Combinations($input['dataset'], $input['length']);

        self::assertSame($input['dataset'], $combinations->getDataset());
        self::assertSame($input['length'], $combinations->getLength());
        self::assertCount(
            count($input['dataset']),
            $combinations->getDataset()
        );
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

    /**
     * Test combinations with big numbers.
     *
     * @see https://github.com/drupol/phpermutations/issues/10
     */
    public function testCombinationsWithBigNumbers()
    {
        $combinations = new Combinations(range(1, 200), 2);
        self::assertCount($combinations->count(), $combinations->toArray());
    }
}
