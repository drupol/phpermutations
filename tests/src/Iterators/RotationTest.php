<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Rotation;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class RotationTest.
 *
 * @internal
 * @coversNothing
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
        $this->assertSame($expected['dataset'], $rotation->current());

        $rotation->rewind();
        $this->assertSame($input['dataset'], $rotation->current());
        $this->assertSame(\count($input['dataset']), $rotation->count());
    }
}
