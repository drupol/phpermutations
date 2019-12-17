<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Fibonacci;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FibonacciTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Iterators\Fibonacci
 */
final class FibonacciTest extends AbstractTest
{
    /**
     * The type.
     */
    public const TYPE = 'fibonacci';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testFibonacci($input, $expected)
    {
        $prime = new Fibonacci();
        $prime->setMaxLimit(1000);

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
