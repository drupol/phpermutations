<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Combinations;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class CombinationsTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class CombinationsTest extends AbstractTest {

  /**
   * The type.
   */
  const TYPE = 'combinations';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
  public function testCombinations($input, $expected) {
    $combinations = new Combinations($input['dataset'], $input['length']);

    $this->assertEquals($input['dataset'], $combinations->getDataset());
    $this->assertEquals($input['length'], $combinations->getLength());
    $this->assertEquals(count($input['dataset']), count($combinations->getDataset()));
    $this->assertEquals($expected['dataset'], $combinations->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
    $this->assertEquals($expected['count'], $combinations->count());
  }

}
