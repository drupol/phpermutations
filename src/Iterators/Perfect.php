<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Perfect.
 *
 * @package drupol\phpermutations\Iterators
 */
class Perfect extends Combinatorics implements \Iterator, \Countable {

  /**
   * The minimum limit.
   *
   * @var int
   */
  protected $min;

  /**
   * The maximum limit.
   *
   * @var int
   */
  protected $max;

  /**
   * The key.
   *
   * @var int
   */
  protected $key;

  /**
   * Perfect constructor.
   */
  public function __construct() {
    $this->setMaxLimit(PHP_INT_MAX);
    $this->setMinLimit(2);
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    for ($i = $this->key(); $i < $this->getMaxLimit(); $i++) {
      if ($this->isPerfectNumber($i)) {
        $this->key = $i;
        return $i;
      }
    }

    return $this->getMaxLimit();
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    $this->key++;
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
    return $this->current() < $this->getMaxLimit();
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->key = $this->getMinLimit();
  }

  /**
   * Count elements of an object.
   *
   * @return int
   *   The number of element.
   */
  public function count() {
    return count($this->toArray());
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
   * Test if a number is perfect or not.
   *
   * Source: http://iceyboard.no-ip.org/projects/code/php/perfect_number/
   *
   * @param int $number
   *   The number to test.
   *
   * @return bool
   *   The true if the number is perfect, false otherwise.
   */
  protected function isPerfectNumber($number) {
    $d = 0;
    $max = sqrt($number);
    for ($n = 2; $n <= $max; $n++) {
      if (!($number % $n)) {
        $d += $n;
        if ($n <> $number / $n) {
          $d += $number / $n;
        }
      }
    }

    return ++$d == $number;
  }

  /**
   * Set the maximum limit.
   *
   * @param int $max
   *   The limit.
   */
  public function setMaxLimit($max) {
    $this->max = $max;
  }

  /**
   * Get the maximum limit.
   *
   * @return int
   *   The limit.
   */
  public function getMaxLimit() {
    return intval($this->max);
  }

  /**
   * Set the minimum limit.
   *
   * @param int $min
   *   The limit.
   */
  public function setMinLimit($min) {
    $this->min = $min;
  }

  /**
   * Get the minimum limit.
   *
   * @return int
   *   The limit.
   */
  public function getMinLimit() {
    return $this->min < 2 ? 2 : $this->min;
  }

}
