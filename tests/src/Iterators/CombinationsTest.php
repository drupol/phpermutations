<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Combinations;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

use function count;

#[CoversClass(Combinations::class)]
final class CombinationsTest extends AbstractTester
{
    public const TYPE = 'combinations';

    #[DataProvider('dataProvider')]
    public function testCombinations($input, $expected)
    {
        $combinations = new Combinations($input['dataset'], $input['length']);

        self::assertSame($input['dataset'], $combinations->getDataset());
        self::assertSame($input['length'], $combinations->getLength());
        self::assertCount(
            count($input['dataset']),
            $combinations->getDataset()
        );

        $array = iterator_to_array($combinations, false);

        self::assertEquals(
            $expected['dataset'],
            $array,
        );

        self::assertCount($expected['count'], $array);
    }

    /**
     * Test combinations with big numbers.
     *
     * @see https://github.com/drupol/phpermutations/issues/10
     */
    public function testCombinationsWithBigNumbers()
    {
        $combinations = new Combinations(range(1, 200), 2);
        $array = iterator_to_array($combinations, false);

        self::assertCount(19900, $array);
    }
}
