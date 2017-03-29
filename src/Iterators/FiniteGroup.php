<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class FiniteGroup.
 *
 * The finite group is an abelian finite cyclic group.
 *
 * @package drupol\phpermutations\Iterators
 */
class FiniteGroup extends Combinatorics implements \Iterator, \Countable {

  /**
   * The group size.
   *
   * @var int
   */
  protected $size;

  /**
   * The group.
   *
   * @var int[]
   */
  protected $group;

  /**
   * The key.
   *
   * @var int
   */
  protected $key;

  /**
   * {@inheritdoc}
   */
  public function current() {
    return current($this->group);
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    $this->key++;
    next($this->group);
  }

  /**
   * {@inheritdoc}
   */
  public function key() {
    return $this->key;
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return isset($this->group[$this->key()]);
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->key = 0;
  }

  /**
   * Count elements of an object.
   *
   * @return int
   *   The number of element.
   */
  public function count() {
    return count($this->group);
  }

  /**
   * Convert the iterator into an array.
   *
   * @return array
   *   The elements.
   */
  public function toArray() {
    $data = array();

    for ($this->rewind(); $this->valid(); $this->next()) {
      $data[] = $this->current();
    }

    return $data;
  }

  /**
   * Set the group size.
   *
   * @param int $size
   *   The size.
   */
  public function setSize($size) {
    $this->size = $size;
    $this->computeGroup();
  }

  /**
   * Get the group size.
   *
   * @return int
   *   The size.
   */
  public function getSize() {
    return intval($this->size);
  }

  /**
   * Clean out the group from unwanted values.
   */
  private function computeGroup() {
    $this->group = array();

    foreach (range(1, $this->getSize() - 1) as $number) {
      if ($this->gcd($number, $this->getSize() - 1) == 1) {
        $this->group[] = $number;
      }
    }
  }

  /**
   * Get the greater common divisor between two numbers.
   *
   * @param int $a
   *   The first number.
   * @param int $b
   *   The second number.
   *
   * @return int
   *   The greater common divisor between $a and $b.
   */
  private function gcd($a, $b) {
    return $b ? $this->gcd($b, $a % $b) : $a;
  }

  /**
   * @param $generator
   *
   * @return int
   */
  public function order($generator) {
    $result = array();

    foreach(range(1, $this->getSize() - 1) as $number) {
      $value = pow($generator, $number) % $this->getSize();
      $result[$value] = $value;
    }

    return count($result);
  }

}
