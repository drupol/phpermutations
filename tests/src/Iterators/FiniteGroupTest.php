<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\FiniteGroup;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FiniteGroupTest.
 *
 * @internal
 * @coversNothing
 */
final class FiniteGroupTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'finitegroup';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testFiniteGroup($input, $expected)
    {
        $prime = new FiniteGroup();
        $prime->setSize($input['size']);

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
