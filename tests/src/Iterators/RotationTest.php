<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Rotation;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class RotationTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 *
 */
class RotationTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'rotation';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
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
        $this->assertEquals(count($input['dataset']), $rotation->count());
    }
}
