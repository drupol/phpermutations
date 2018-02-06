<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Shift;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class ShiftTest.
 */
class ShiftTest extends AbstractTest
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
        $this->assertEquals($expected['current'], $shift->current());

        $this->assertEquals($input['dataset'], $shift->getDataset());
        $this->assertEquals($expected['count'], $shift->count());
    }
}
