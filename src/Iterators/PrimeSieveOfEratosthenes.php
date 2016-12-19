<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class PrimeSieveOfEratosthenes.
 *
 * @package drupol\phpermutations\Iterators
 */
class PrimeSieveOfEratosthenes extends Combinatorics implements \Iterator, \Countable {

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
   * The primes array.
   *
   * @var array
   */
  private $primes;

  /**
   * @var int
   */
  private $last;

  /**
   * PrimeSieveOfEratosthenes constructor.
   */
  public function __construct() {
    $this->setMaxLimit(PHP_INT_MAX);
    $this->setMinLimit(0);
    $this->primes = array(2, 3);
  }

  /**
   *
   */
  private function generateNextPrime() {
    $candidate = end($this->primes);

    do {
      $candidate += 2;
      $isPrime = TRUE;
      foreach ($this->primes as $prime) {
        if ($candidate % $prime == 0) {
          $isPrime = FALSE;
          break;
        }
        if ($prime * $prime > $candidate) {
          break;
        }
      }
    } while (!$isPrime);

    $this->primes[] = $candidate;
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->key = 0;
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    if (!isset($this->primes[$this->key()])) {
      $this->generateNextPrime();
    }

    $this->last = $this->primes[$this->key()];

    return $this->last;
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return $this->last < $this->getMaxLimit();
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
  public function next() {
    ++$this->key;
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
    return $this->min <= 2 ? 2 : intval($this->min);
  }

  /**
   * Get a rough estimation of how many prime numbers there are.
   *
   * @return float
   *   The number of primes.
   */
  public function pi() {
    return $this->getMaxLimit() / log($this->getMaxLimit());
  }

}
