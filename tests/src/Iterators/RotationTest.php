<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Rotation;
use PHPUnit\Framework\TestCase;

/**
 * Class RotationTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class RotationTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testRotation($input, $expected) {
    $rotation = new Rotation($input['dataset']);

    $input += array(
      'turn' => NULL,
    );
    $rotation->next($input['turn']);
    $this->assertSame($expected['dataset'], $rotation->current());

    $rotation->rewind();
    $this->assertSame($input['dataset'], $rotation->current());
    $this->assertEquals(count($input['dataset']), $rotation->count());
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
        ],
        'output' => [
          'dataset' => [2, 3, 4, 5, 1],
        ],
      ],
      [
        'input' => [
          'dataset' => [1, 2, 3, 4, 5],
          'turn' => 0,
        ],
        'output' => [
          'dataset' => [1, 2, 3, 4, 5],
        ],
      ],
      [
        'input' => [
          'dataset' => [1, 2, 3, 4, 5],
          'turn' => 1,
        ],
        'output' => [
          'dataset' => [2, 3, 4, 5, 1],
        ],
      ],
      [
        'input' => [
          'dataset' => [1, 2, 3, 4, 5],
          'turn' => 6,
        ],
        'output' => [
          'dataset' => [2, 3, 4, 5, 1],
        ],
      ],
    ];
  }

}
