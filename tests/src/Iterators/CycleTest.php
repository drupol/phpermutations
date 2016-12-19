<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Cycle;
use PHPUnit\Framework\TestCase;

/**
 * Class CycleTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class CycleTest extends TestCase {

  /**
   * @dataProvider simpleValueProvider
   */
  public function testCycle($input, $expected) {
    $cycle = new Cycle($input['dataset']);

    for ($i = 0; $i < count($cycle->getDataset()) + 1; $i++) {
      $cycle->next();
    }
    $this->assertEquals($cycle->getDataset()[1], $cycle->current());
    $cycle->next();
    $this->assertEquals($cycle->getDataset()[2], $cycle->current());

    $this->assertEquals($input['dataset'], $cycle->getDataset());
    $this->assertEquals($expected['count'], $cycle->count());
  }

  /**
   *
   */
  public function simpleValueProvider() {
    return [
      [
        'input' => [
          'dataset' => [1, 2, 3, 4, 5],
        ],
        'output' => [
          'count' => 5,
        ],
      ],
    ];
  }

}
