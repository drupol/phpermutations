<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Cycle;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class CycleTest.
 */
class CycleTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'cycle';

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
        $this->assertEquals($expected['current'], $cycle->current());

        $this->assertEquals($input['dataset'], $cycle->getDataset());
        $this->assertEquals($expected['count'], $cycle->count());
    }
}
