<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Rotation;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

use function count;

#[CoversClass(Rotation::class)]
final class RotationTest extends AbstractTester
{
    public const TYPE = 'rotation';

    #[DataProvider('dataProvider')]
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
