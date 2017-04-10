<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Permutations;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class PermutationsTest.
 *
 * @package drupol\phpermutations\Tests\Generators
 */
class PermutationsTest extends AbstractTest
{

  /**
   * The type.
   */
    const TYPE = 'permutations';

  /**
   * Test.
   *
   * @dataProvider dataProvider
   *   The data provider
   */
    public function testPermutations($input, $expected)
    {
        $generator = new Permutations($input['dataset'], $input['length']);

        $this->assertEquals($input['dataset'], $generator->getDataset());
        $this->assertEquals($input['length'], $generator->getLength());
        $this->assertEquals($expected['count'], $generator->count());
        $this->assertEquals(
            $expected['dataset'],
            $generator->toArray(),
            "\$canonicalize = true",
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
