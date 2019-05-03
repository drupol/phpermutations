<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Rotation;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class RotationTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Iterators\Rotation
 */
final class RotationTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'rotation';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testRotation($input, $expected)
    {
        $rotation = new Rotation($input['dataset']);

        $input += [
            'turn' => null,
        ];
        $rotation->next($input['turn']);
        static::assertSame($expected['dataset'], $rotation->current());

        $rotation->rewind();
        static::assertSame($input['dataset'], $rotation->current());
        static::assertSame(\count($input['dataset']), $rotation->count());
    }
}
