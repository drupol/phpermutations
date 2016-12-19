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
   * @return \Generator
   */
  public function generator() {
    return $this->get($this->getDataset());
  }

  /**
   * @param $data
   *
   * @return \Generator
   */
  protected function get($data) {
    if (count($data) <= 1) {
      yield $data;
    }
    else {
      foreach (range(0, count($data) - 1) as $i) {
        foreach ($this->get(array_slice($data, 1)) as $item) {
          yield array_merge(array_slice($item, 0, $i), array_slice($data, 0, 1), array_slice($item, $i));
        }
      }
    }
  }

}
