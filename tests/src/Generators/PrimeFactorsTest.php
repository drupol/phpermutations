<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Iterators\PrimeFactors;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PrimeFactorsTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\PrimeFactors
 */
final class PrimeFactorsTest extends AbstractTest
{
    /**
     * The type.
     */
    public const TYPE = 'primefactors';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testPrimeFactors($input, $expected)
    {
        $prime = new PrimeFactors();
        $prime->setNumber($input['number']);

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
