<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Combinations;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PermutationsTest.
 */
class CombinationsTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'combinations';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testCombinationsClass($input, $expected)
    {
        $combinations = new Combinations($input['dataset'], $input['length']);

        $this->assertEquals($input['dataset'], $combinations->getDataset());
        $this->assertEquals($input['length'], $combinations->getLength());
        $this->assertEquals(
            $expected['dataset'],
            $combinations->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
        $this->assertEquals($expected['count'], $combinations->count());
    }
}
