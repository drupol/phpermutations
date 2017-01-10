<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\FiniteGroup;
use PHPUnit\Framework\TestCase;

/**
 * Class FiniteGroupTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class FiniteGroupTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testFiniteGroup($input, $expected) {
    $prime = new FiniteGroup();
    $prime->setSize($input['size']);

    $this->assertEquals($expected['count'], $prime->count());
    $this->assertEquals($expected['dataset'], $prime->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
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
          'size' => 10,
        ],
        'output' => [
          'dataset' => [
            1,
            2,
            4,
            5,
            7,
            8,
          ],
          'count' => 6,
        ],
      ],
    ];
  }

}
