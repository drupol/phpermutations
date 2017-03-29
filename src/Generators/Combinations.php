<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Combinations.
 *
 * @package drupol\phpermutations\Generators
 *
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class Combinations extends Combinatorics {

  /**
   * Alias of the get() method.
   *
   * @return \Generator
   *   The prime generator.
   */
  public function generator() {
    return $this->get($this->getDataset(), $this->getLength());
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
  protected function get(array $dataset, $length) {
    $originalLength  = count($dataset);
    $remainingLength = $originalLength - $length + 1;
    for ($i = 0; $i < $remainingLength; $i++) {
      $current = $dataset[$i];
      if ($length === 1) {
        yield [$current];
      } else {
        $remaining = array_slice($dataset, $i + 1);
        foreach ($this->get($remaining, $length - 1) as $permutation) {
          array_unshift($permutation, $current);
          yield $permutation;
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function count() {
    return $this->fact(count($this->getDataset())) / ($this->fact($this->getLength()) * $this->fact(count($this->getDataset()) - $this->getLength()));
  }

  /**
   * Convert the iterator into an array.
   *
   * @return array
   *   The elements.
   */
  public function toArray() {
    $data = array();

    foreach ($this->generator() as $value) {
      $data[] = $value;
    }

    return $data;
  }

}
