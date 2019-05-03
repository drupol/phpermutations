<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Fibonacci;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FibonacciTest.
 *
 * @internal
 * @coversNothing
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

        $this->assertSame($expected['count'], $prime->count());
        $this->assertEquals(
            $expected['dataset'],
            $prime->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
