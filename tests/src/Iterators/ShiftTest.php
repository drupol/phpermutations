<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Shift;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class ShiftTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Iterators\Shift
 */
final class ShiftTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'shift';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testShift($input, $expected)
    {
        $shift = new Shift($input['dataset']);

        for ($i = 0; $i < $input['turn']; ++$i) {
            $shift->next();
        }
        static::assertSame($expected['current'], $shift->current());

        static::assertSame($input['dataset'], $shift->getDataset());
        static::assertSame($expected['count'], $shift->count());
    }
}
