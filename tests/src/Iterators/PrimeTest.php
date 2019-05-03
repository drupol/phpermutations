<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Prime;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PrimeTest.
 *
 * @internal
 * @coversNothing
 */
final class PrimeTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'prime';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testPrime($input, $expected)
    {
        $prime = new Prime();
        $prime->setMinLimit($input['min']);
        $prime->setMaxLimit($input['max']);

        if (2 > $input['min']) {
            $this->assertSame(2, $prime->getMinLimit());
        } else {
            $this->assertSame($input['min'], $prime->getMinLimit());
        }
        $this->assertSame($input['max'], $prime->getMaxLimit());
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
