<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Combinations;
use PHPUnit\Framework\TestCase;

/**
 * Class PermutationsTest.
 *
 * @package drupol\phpermutations\Tests
 */
class CombinationsTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testCombinationsClass($input, $expected) {
    $combinations = new Combinations($input['dataset'], $input['length']);

    $this->assertEquals($input['dataset'], $combinations->getDataset());
    $this->assertEquals($input['length'], $combinations->getLength());
    $this->assertEquals($expected['dataset'], $combinations->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
    $this->assertEquals($expected['count'], $combinations->count());
  }

  /**
   * The data provider.
   *
   * @return array
   *   The test input values and their expected output.
   */
  public function simpleValueProvider() {
    return [
      [
        'input' => [
          'dataset' => [1, 2, 3, 4, 5],
          'length' => 5,
        ],
        'output' => [
          'dataset' => [
            [1, 2, 3, 4, 5],
          ],
          'count' => 1,
        ],
      ],
      [
        'input' => [
          'dataset' => [1, 2, 3, 4, 5],
          'length' => 3,
        ],
        'output' => [
          'dataset' => [
            [1, 2, 3],
            [1, 2, 4],
            [1, 2, 5],
            [1, 3, 4],
            [1, 3, 5],
            [1, 4, 5],
            [2, 3, 4],
            [2, 3, 5],
            [2, 4, 5],
            [3, 4, 5],
          ],
          'count' => 10,
        ],
      ],
    ];
  }

}
