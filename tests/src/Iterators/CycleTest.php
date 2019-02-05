<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Cycle;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class CycleTest.
 *
 * @internal
 * @coversNothing
 */
final class CycleTest extends AbstractTest
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
        $this->assertSame($expected['current'], $cycle->current());

        $this->assertSame($input['dataset'], $cycle->getDataset());
        $this->assertSame($expected['count'], $cycle->count());
    }
}
