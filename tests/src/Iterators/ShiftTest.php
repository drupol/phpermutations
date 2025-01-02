<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Shift;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Shift::class)]
final class ShiftTest extends AbstractTester
{
    public const TYPE = 'shift';

    #[DataProvider('dataProvider')]
    public function testShift($input, $expected)
    {
        $shift = new Shift($input['dataset']);

        for ($i = 0; $i < $input['turn']; ++$i) {
            $shift->next();
        }
        self::assertSame($expected['current'], $shift->current());

        self::assertSame($input['dataset'], $shift->getDataset());
        self::assertSame($expected['count'], $shift->count());
    }
}
