<?php

namespace drupol\phpermutations;

use drupol\phpermutations\Iterators\Combinations;

/**
 * Class Permutations.
 *
 * @package drupol\phpermutations
 */
class Permutations extends Combinatorics {

  /**
   * Permutations constructor.
   *
   * @param array $dataset
   *   The dataset.
   * @param int $length
   *   The length of the requested permutations.
   */
  public function __construct(array $dataset = array(), $length = NULL) {
    parent::__construct($dataset, $length);
  }

  /**
   * Count the number of permutations.
   *
   * @return int
   *   The number of element.
   */
  public function count() {
    return $this->fact(count($this->getDataset())) / $this->fact(count($this->getDataset()) - $this->getLength());
  }

  /**
   * Return the permutations.
   *
   * @return array
   *   The permutations result set.
   */
  public function generator() {
    $combinations = new Combinations($this->getDataset(), $this->getLength());
    $result = array();

    foreach ($combinations->toArray() as $subset) {
      $set = $subset;
      $perms = array();
      $size = count($subset) - 1;
      $perm = range(0, $size);
      $j = 0;

      do {
        foreach ($perm as $i) {
          $perms[$j][] = $set[$i];
        }
      } while ($perm = $this->permute($perm, $size) and ++$j);

      $result = array_merge($result, $perms);
    }

    return $result;
  }

  /**
   * Internal method to compute the permutations.
   *
   * @param array $items
   *   The items.
   * @param int $length
   *   The length.
   *
   * @return bool|array
   *   The permutations.
   */
  protected function permute(array $items, $length) {
    // Slide down the array looking for where we're smaller than the next guy.
    for ($i = $length - 1; $i >= 0 && $items[$i] >= $items[$i + 1]; --$i) {
    }

    // If this doesn't occur, we've finished our permutations
    // the array is reversed: (1, 2, 3, 4) => (4, 3, 2, 1)
    if ($i == -1) {
      return FALSE;
    }

    // Slide down the array looking for a bigger number
    // than what we found before.
    for ($j = $length; $items[$j] <= $items[$i]; --$j) {
    }

    // Swap them.
    $this->swap($items[$i], $items[$j]);

    // Now reverse the elements in between by swapping the ends.
    for (++$i, $j = $length; $i < $j; ++$i, --$j) {
      $this->swap($items[$i], $items[$j]);
    }

    return $items;
  }

  /**
   * Swap two variables.
   *
   * @param mixed $x
   *   The first variable.
   * @param mixed $y
   *   The second variable.
   */
  protected function swap(&$x, &$y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
  }

  /**
   * Transform the iterator into an array.
   *
   * @return array
   *   The permutations result set.
   */
  public function toArray() {
    $results = array();

    foreach ($this->generator() as $value) {
      $results[] = $value;
    }

    return $results;
  }

}
