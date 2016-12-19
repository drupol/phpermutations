<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Perfect;
use PHPUnit\Framework\TestCase;

/**
 * Class PerfectTest.
 *
 * @package drupol\phpermutations\Tests\Generators
 */
class PerfectTest extends TestCase {

  /**
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
    $this->assertEquals($expected['count'], $perfect->count());
    $this->assertEquals($expected['dataset'], $perfect->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
  }

  /**
   *
   */
  public function simpleValueProvider() {
    return [
      [
        'input' => [
          'min' => 0,
          'max' => 1000,
        ],
        'output' => [
          'dataset' => [
            6,
            28,
            496,
          ],
          'count' => 3,
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
