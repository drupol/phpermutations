<?php

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
    const TYPE = 'permutations';

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

        static::assertSame($input['dataset'], $generator->getDataset());
        static::assertSame($input['length'], $generator->getLength());
        static::assertSame($expected['count'], $generator->count());
        static::assertEquals(
            $expected['dataset'],
            $generator->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
