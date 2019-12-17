<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Cycle;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class CycleTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Iterators\Cycle
 */
final class CycleTest extends AbstractTest
{
    /**
     * The type.
     */
    public const TYPE = 'cycle';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
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
