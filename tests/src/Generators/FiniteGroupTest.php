<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\FiniteGroup;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class FiniteGroupTest.
 *
 * @package drupol\phpermutations\Tests\Generators
 */
class FiniteGroupTest extends AbstractTest {

  /**
   * The type.
   */
  const TYPE = 'finitegroup';

  /**
   * The tests.
   *
   * @dataProvider dataProvider
   */
  public function testFiniteGroup($input, $expected) {
    $prime = new FiniteGroup();
    $prime->setSize($input['size']);

    $this->assertEquals($expected['count'], $prime->count());
    $this->assertEquals($expected['dataset'], $prime->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
  }

}
