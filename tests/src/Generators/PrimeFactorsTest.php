<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Iterators\PrimeFactors;
use PHPUnit\Framework\TestCase;

/**
 * Class PrimeFactorsTest.
 *
 * @package drupol\phpermutations\Tests\Generators
 */
class PrimeFactorsTest extends TestCase {

  /**
   * The tests.
   *
   * @dataProvider simpleValueProvider
   */
  public function testPrimeFactors($input, $expected) {
    $prime = new PrimeFactors();
    $prime->setNumber($input['number']);

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
          'number' => 643455,
        ],
        'output' => [
          'dataset' => [
            3,
            3,
            5,
            79,
            181,
          ],
          'count' => 5,
        ],
      ],
    ];
  }

}
