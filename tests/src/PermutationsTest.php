<?php

namespace drupol\phpermutations\Tests;

use drupol\phpermutations\Permutations;
use PHPUnit\Framework\TestCase;

/**
 * Class PermutationsTest.
 *
 * @package drupol\phpermutations\Tests
 */
class PermutationsTest extends TestCase {

  /**
   * @dataProvider simpleValueProvider
   */
  public function testPermutationsClass($input, $expected) {
    $permutations = new Permutations($input['dataset'], $input['length']);

    $this->assertEquals($input['dataset'], $permutations->getDataset());
    $this->assertEquals($input['length'], $permutations->getLength());
    $this->assertEquals($expected['dataset'], $permutations->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
    $this->assertEquals($expected['count'], $permutations->count());
  }

  /**
   *
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
            [2, 1, 3, 4, 5],
            [1, 3, 2, 4, 5],
            [3, 1, 2, 4, 5],
            [2, 3, 1, 4, 5],
            [3, 2, 1, 4, 5],
            [1, 2, 4, 3, 5],
            [2, 1, 4, 3, 5],
            [1, 4, 2, 3, 5],
            [4, 1, 2, 3, 5],
            [2, 4, 1, 3, 5],
            [4, 2, 1, 3, 5],
            [1, 3, 4, 2, 5],
            [3, 1, 4, 2, 5],
            [1, 4, 3, 2, 5],
            [4, 1, 3, 2, 5],
            [3, 4, 1, 2, 5],
            [4, 3, 1, 2, 5],
            [2, 3, 4, 1, 5],
            [3, 2, 4, 1, 5],
            [2, 4, 3, 1, 5],
            [4, 2, 3, 1, 5],
            [3, 4, 2, 1, 5],
            [4, 3, 2, 1, 5],
            [1, 2, 3, 5, 4],
            [2, 1, 3, 5, 4],
            [1, 3, 2, 5, 4],
            [3, 1, 2, 5, 4],
            [2, 3, 1, 5, 4],
            [3, 2, 1, 5, 4],
            [1, 2, 5, 3, 4],
            [2, 1, 5, 3, 4],
            [1, 5, 2, 3, 4],
            [5, 1, 2, 3, 4],
            [2, 5, 1, 3, 4],
            [5, 2, 1, 3, 4],
            [1, 3, 5, 2, 4],
            [3, 1, 5, 2, 4],
            [1, 5, 3, 2, 4],
            [5, 1, 3, 2, 4],
            [3, 5, 1, 2, 4],
            [5, 3, 1, 2, 4],
            [2, 3, 5, 1, 4],
            [3, 2, 5, 1, 4],
            [2, 5, 3, 1, 4],
            [5, 2, 3, 1, 4],
            [3, 5, 2, 1, 4],
            [5, 3, 2, 1, 4],
            [1, 2, 4, 5, 3],
            [2, 1, 4, 5, 3],
            [1, 4, 2, 5, 3],
            [4, 1, 2, 5, 3],
            [2, 4, 1, 5, 3],
            [4, 2, 1, 5, 3],
            [1, 2, 5, 4, 3],
            [2, 1, 5, 4, 3],
            [1, 5, 2, 4, 3],
            [5, 1, 2, 4, 3],
            [2, 5, 1, 4, 3],
            [5, 2, 1, 4, 3],
            [1, 4, 5, 2, 3],
            [4, 1, 5, 2, 3],
            [1, 5, 4, 2, 3],
            [5, 1, 4, 2, 3],
            [4, 5, 1, 2, 3],
            [5, 4, 1, 2, 3],
            [2, 4, 5, 1, 3],
            [4, 2, 5, 1, 3],
            [2, 5, 4, 1, 3],
            [5, 2, 4, 1, 3],
            [4, 5, 2, 1, 3],
            [5, 4, 2, 1, 3],
            [1, 3, 4, 5, 2],
            [3, 1, 4, 5, 2],
            [1, 4, 3, 5, 2],
            [4, 1, 3, 5, 2],
            [3, 4, 1, 5, 2],
            [4, 3, 1, 5, 2],
            [1, 3, 5, 4, 2],
            [3, 1, 5, 4, 2],
            [1, 5, 3, 4, 2],
            [5, 1, 3, 4, 2],
            [3, 5, 1, 4, 2],
            [5, 3, 1, 4, 2],
            [1, 4, 5, 3, 2],
            [4, 1, 5, 3, 2],
            [1, 5, 4, 3, 2],
            [5, 1, 4, 3, 2],
            [4, 5, 1, 3, 2],
            [5, 4, 1, 3, 2],
            [3, 4, 5, 1, 2],
            [4, 3, 5, 1, 2],
            [3, 5, 4, 1, 2],
            [5, 3, 4, 1, 2],
            [4, 5, 3, 1, 2],
            [5, 4, 3, 1, 2],
            [2, 3, 4, 5, 1],
            [3, 2, 4, 5, 1],
            [2, 4, 3, 5, 1],
            [4, 2, 3, 5, 1],
            [3, 4, 2, 5, 1],
            [4, 3, 2, 5, 1],
            [2, 3, 5, 4, 1],
            [3, 2, 5, 4, 1],
            [2, 5, 3, 4, 1],
            [5, 2, 3, 4, 1],
            [3, 5, 2, 4, 1],
            [5, 3, 2, 4, 1],
            [2, 4, 5, 3, 1],
            [4, 2, 5, 3, 1],
            [2, 5, 4, 3, 1],
            [5, 2, 4, 3, 1],
            [4, 5, 2, 3, 1],
            [5, 4, 2, 3, 1],
            [3, 4, 5, 2, 1],
            [4, 3, 5, 2, 1],
            [3, 5, 4, 2, 1],
            [5, 3, 4, 2, 1],
            [4, 5, 3, 2, 1],
            [5, 4, 3, 2, 1],
          ],
          'count' => 120,
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
            [2, 1, 3],
            [1, 3, 2],
            [3, 1, 2],
            [2, 3, 1],
            [3, 2, 1],
            [1, 2, 4],
            [2, 1, 4],
            [1, 4, 2],
            [4, 1, 2],
            [2, 4, 1],
            [4, 2, 1],
            [1, 2, 5],
            [2, 1, 5],
            [1, 5, 2],
            [5, 1, 2],
            [2, 5, 1],
            [5, 2, 1],
            [1, 3, 4],
            [3, 1, 4],
            [1, 4, 3],
            [4, 1, 3],
            [3, 4, 1],
            [4, 3, 1],
            [1, 3, 5],
            [3, 1, 5],
            [1, 5, 3],
            [5, 1, 3],
            [3, 5, 1],
            [5, 3, 1],
            [1, 4, 5],
            [4, 1, 5],
            [1, 5, 4],
            [5, 1, 4],
            [4, 5, 1],
            [5, 4, 1],
            [2, 3, 4],
            [3, 2, 4],
            [2, 4, 3],
            [4, 2, 3],
            [3, 4, 2],
            [4, 3, 2],
            [2, 3, 5],
            [3, 2, 5],
            [2, 5, 3],
            [5, 2, 3],
            [3, 5, 2],
            [5, 3, 2],
            [2, 4, 5],
            [4, 2, 5],
            [2, 5, 4],
            [5, 2, 4],
            [4, 5, 2],
            [5, 4, 2],
            [3, 4, 5],
            [4, 3, 5],
            [3, 5, 4],
            [5, 3, 4],
            [4, 5, 3],
            [5, 4, 3],
          ],
          'count' => 60,
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
            [['element 2'], ['element 1'], ['element 3']],
            [['element 1'], ['element 3'], ['element 2']],
            [['element 3'], ['element 1'], ['element 2']],
            [['element 2'], ['element 3'], ['element 1']],
            [['element 3'], ['element 2'], ['element 1']],
            [['element 1'], ['element 2'], ['element 4']],
            [['element 2'], ['element 1'], ['element 4']],
            [['element 1'], ['element 4'], ['element 2']],
            [['element 4'], ['element 1'], ['element 2']],
            [['element 2'], ['element 4'], ['element 1']],
            [['element 4'], ['element 2'], ['element 1']],
            [['element 1'], ['element 3'], ['element 4']],
            [['element 3'], ['element 1'], ['element 4']],
            [['element 1'], ['element 4'], ['element 3']],
            [['element 4'], ['element 1'], ['element 3']],
            [['element 3'], ['element 4'], ['element 1']],
            [['element 4'], ['element 3'], ['element 1']],
            [['element 2'], ['element 3'], ['element 4']],
            [['element 3'], ['element 2'], ['element 4']],
            [['element 2'], ['element 4'], ['element 3']],
            [['element 4'], ['element 2'], ['element 3']],
            [['element 3'], ['element 4'], ['element 2']],
            [['element 4'], ['element 3'], ['element 2']],
          ],
          'count' => 24,
        ],
      ],
    ];
  }

}
