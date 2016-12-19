<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Combinations;
use PHPUnit\Framework\TestCase;

/**
 * Class CombinationsTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class CombinationsTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testCombinations($input, $expected) {
    $combinations = new Combinations($input['dataset'], $input['length']);

    $this->assertEquals($input['dataset'], $combinations->getDataset());
    $this->assertEquals($input['length'], $combinations->getLength());
    $this->assertEquals(count($input['dataset']), count($combinations->getDataset()));
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
          'length' => 4,
        ],
        'output' => [
          'dataset' => [
            [1, 2, 3, 4],
            [1, 2, 3, 5],
            [1, 2, 4, 5],
            [1, 3, 4, 5],
            [2, 3, 4, 5],
          ],
          'count' => 5,
        ],
      ],
      [
        'input' => [
          'dataset' => [
            ['element 1'],
            ['element 2'],
            ['element 3'],
            ['element 4'],
          ],
          'length' => 3,
        ],
        'output' => [
          'dataset' => [
            [['element 1'], ['element 2'], ['element 3']],
            [['element 1'], ['element 2'], ['element 4']],
            [['element 1'], ['element 3'], ['element 4']],
            [['element 2'], ['element 3'], ['element 4']],
          ],
          'count' => 4,
        ],
      ],
    ];
  }

}
