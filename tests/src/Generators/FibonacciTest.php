<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Fibonacci;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FibonacciTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\Fibonacci
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
