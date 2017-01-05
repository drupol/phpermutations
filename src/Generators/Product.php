<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Iterators\Product as ProductIterator;

/**
 * Class Product.
 *
 * @package drupol\phpermutations\Generators
 */
class Product extends ProductIterator {

  /**
   * Get the generator.
   *
   * @return \Generator
   *   The generator.
   */
  public function generator() {
    return $this->get($this->getDataset());
  }

  /**
   * Get the generator.
   *
   * @param array $data
   *   The dataset.
   *
   * @return \Generator
   *   The generator.
   */
  protected function get(array $data) {
    if (!empty($data)) {
      if ($u = array_pop($data)) {
        foreach ($this->get($data) as $p) {
          foreach ($u as $v) {
            yield $p + [count($p) => $v];
          }
        }
      }
    }
    else {
      yield [];
    }
  }

}
