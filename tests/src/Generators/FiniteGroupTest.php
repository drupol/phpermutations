<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\FiniteGroup;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FiniteGroupTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\FiniteGroup
 */
final class FiniteGroupTest extends AbstractTest
{
    /**
     * The type.
     */
    public const TYPE = 'finitegroup';

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
