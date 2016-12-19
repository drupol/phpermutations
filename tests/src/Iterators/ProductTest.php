<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class ProductTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testProduct($input, $expected) {
    $product = new Product($input['dataset']);

    $this->assertEquals($input['dataset'], $product->getDataset());
    $this->assertEquals($expected['dataset'], $product->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
    $this->assertEquals($expected['count'], $product->count());
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
          'dataset' => [
            [1, 2, 3, 4, 5],
            [1, 2, 3, 4, 5],
          ],
        ],
        'output' => [
          'dataset' => [
            [1, 1],
            [1, 2],
            [1, 3],
            [1, 4],
            [1, 5],
            [2, 1],
            [2, 2],
            [2, 3],
            [2, 4],
            [2, 5],
            [3, 1],
            [3, 2],
            [3, 3],
            [3, 4],
            [3, 5],
            [4, 1],
            [4, 2],
            [4, 3],
            [4, 4],
            [4, 5],
            [5, 1],
            [5, 2],
            [5, 3],
            [5, 4],
            [5, 5],
          ],
          'count' => 25,
        ],
      ],
      [
        'input' => [
          'dataset' => [
            [1, 2, 3, 4],
            [1, 2, 3],
          ],
        ],
        'output' => [
          'dataset' => [
            [1, 1],
            [2, 1],
            [3, 1],
            [4, 1],
            [1, 2],
            [2, 2],
            [3, 2],
            [4, 2],
            [1, 3],
            [2, 3],
            [3, 3],
            [4, 3],
          ],
          'count' => 12,
        ],
      ],
    ];
  }

}
