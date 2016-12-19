<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Permutations as PermutationsClass;

/**
 * Class Permutations.
 *
 * @package drupol\phpermutations\Generators
 */
class Permutations extends PermutationsClass {

  /**
   * Alias of the get() method.
   *
   * @return \Generator
   *   The prime generator.
   */
  public function generator() {
    return $this->get($this->getDataset());
  }

  /**
   * The generator.
   *
   * @param array $dataset
   *   The dataset.
   *
   * @codingStandardsIgnoreStart
   * @return \Generator
   * @codingStandardsIgnoreEnd
   */
  protected function get(array $dataset) {
    if (count($dataset) <= 1) {
      yield $dataset;
    }
    else {
      foreach (range(0, count($dataset) - 1) as $i) {
        foreach ($this->get(array_slice($dataset, 1)) as $item) {
          yield array_merge(array_slice($item, 0, $i), array_slice($dataset, 0, 1), array_slice($item, $i));
        }
      }
    }
  }

}
