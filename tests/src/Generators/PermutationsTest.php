<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Permutations;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PermutationsTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\Permutations
 */
final class PermutationsTest extends AbstractTest
{
    /**
     * The type.
     */
    public const TYPE = 'permutations';

    /**
     * Test.
     *
     * @dataProvider dataProvider
     *   The data provider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testPermutations($input, $expected)
    {
        $generator = new Permutations($input['dataset'], $input['length']);

        self::assertSame($input['dataset'], $generator->getDataset());
        self::assertSame($input['length'], $generator->getLength());
        self::assertSame($expected['count'], $generator->count());
        self::assertEquals(
            $expected['dataset'],
            $generator->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
