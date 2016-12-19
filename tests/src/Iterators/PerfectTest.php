<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Perfect;
use PHPUnit\Framework\TestCase;

/**
 * Class PerfectTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class PerfectTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testPerfect($input, $expected) {
    $perfect = new Perfect();
    $perfect->setMinLimit($input['min']);
    $perfect->setMaxLimit($input['max']);

    if ($input['min'] < 2) {
      $this->assertEquals(2, $perfect->getMinLimit());
    }
    else {
      $this->assertEquals($input['min'], $perfect->getMinLimit());
    }
    $this->assertEquals($input['max'], $perfect->getMaxLimit());
    $this->assertEquals($input['max'], $perfect->getMaxLimit());
    $this->assertEquals($expected['count'], $perfect->count());
    $this->assertEquals($expected['dataset'], $perfect->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
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
          'min' => 0,
          'max' => 10000,
        ],
        'output' => [
          'dataset' => [
            6,
            28,
            496,
            8128,
          ],
          'count' => 4,
        ],
      ],
      [
        'input' => [
          'min' => 500,
          'max' => 10000,
        ],
        'output' => [
          'dataset' => [
            8128,
          ],
          'count' => 1,
        ],
      ],
    ];
  }

}
