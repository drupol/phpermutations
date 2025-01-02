<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Cycle;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Cycle::class)]
final class CycleTest extends AbstractTester
{
    public const TYPE = 'cycle';

    #[DataProvider('dataProvider')]
    public function testCycle($input, $expected)
    {
        $cycle = new Cycle($input['dataset']);

        for ($i = 0; $i < $input['turn']; ++$i) {
            $cycle->next();
        }
        self::assertSame($expected['current'], $cycle->current());

        self::assertSame($input['dataset'], $cycle->getDataset());
        self::assertSame($expected['count'], $cycle->count());
    }
}
