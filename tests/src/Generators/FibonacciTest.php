<?php

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
    const TYPE = 'fibonacci';

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

        static::assertSame($expected['count'], $prime->count());
        static::assertEquals(
            $expected['dataset'],
            $prime->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
