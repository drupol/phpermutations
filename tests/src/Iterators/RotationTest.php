<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Rotation;
use drupol\phpermutations\Tests\AbstractTest;
use function count;

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
    public const TYPE = 'rotation';

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
        self::assertSame($expected['dataset'], $rotation->current());

        $rotation->rewind();
        self::assertSame($input['dataset'], $rotation->current());
        self::assertSame(count($input['dataset']), $rotation->count());
    }
}
