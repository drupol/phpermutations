<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Permutations as PermutationsClass;

/**
 * Class Permutations.
 *
 * @package drupol\phpermutations\Generators
 *
 * @author Mark Wilson <mark@89allport.co.uk>
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
    foreach ($dataset as $key => $firstItem) {
      $remaining = $dataset;
      array_splice($remaining, $key, 1);
      if (count($remaining) === 0) {
        yield [$firstItem];
        continue;
      }
      foreach ($this->get($remaining) as $permutation) {
        array_unshift($permutation, $firstItem);
        yield $permutation;
      }
    }
  }

}
