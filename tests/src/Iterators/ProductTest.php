<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Product;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class ProductTest.
 *
 * @package drupol\phpermutations\Tests\Iterators
 */
class ProductTest extends AbstractTest {

  /**
   * The type.
   */
  const TYPE = 'product';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
  public function testProduct($input, $expected) {
    $product = new Product($input['dataset']);

    $this->assertEquals($input['dataset'], $product->getDataset());
    $this->assertEquals($expected['dataset'], $product->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
    $this->assertEquals($expected['count'], $product->count());
  }

}
