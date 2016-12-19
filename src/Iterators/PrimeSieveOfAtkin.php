<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class PrimeSieveOfAtkin.
 *
 * @package drupol\phpermutations\Iterators
 */
class PrimeSieveOfAtkin extends Combinatorics implements \Iterator, \Countable {

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
  protected $primesData;

  /**
   * The primes array.
   *
   * @var array
   */
  protected $primes;

  /**
   * The primes array converted.
   *
   * @var array
   */
  protected $data;

  /**
   * @var int
   */
  private $last;

  private $count;

  /**
   * PrimeSieveOfAtkin constructor.
   */
  public function __construct() {
    $this->primesData = new \ArrayObject(array(2 => 1, 3 => 1));
    $this->primes = array(2, 3);
    $this->setMinLimit(0);
    $this->max = PHP_INT_MAX;
  }

  private function generateNextPrime() {
    $candidate = $limit = end($this->primes);

    do {
      $candidate += 2;
      $primes = $this->findPrimes($candidate);
    } while (!isset($primes[$this->key()]));

    return array_keys($primes);
  }

  /**
   * @param $index
   */
  private function toggle(&$primes, $index) {
    if (!isset($primes[$index])) {
      $primes[$index] = FALSE;
    }

    $primes[$index] ^= TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    if (!isset($this->primes[$this->key()])) {
      $this->primes = $this->generateNextPrime();
    }
    return $this->primes[$this->key()];
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return ($this->current() < $this->getMaxLimit());
  }

  public function findPrimes($limit) {
    $sqrt = sqrt($limit);
    $isPrime = array();
    for ($i = 1; $i <= $sqrt; $i++) {
      for ($j = 1; $j <= $sqrt; $j++) {
        $n = 4 * pow($i, 2) + pow($j, 2);
        if ($n <= $limit && ($n % 12 == 1 || $n % 12 == 5)) {
          $this->toggle($isPrime, $n);
        }
        $n = 3 * pow($i, 2) + pow($j, 2);
        if ($n <= $limit && $n % 12 == 7) {
          $this->toggle($isPrime, $n);
        }
        $n = 3 * pow($i, 2) - pow($j, 2);
        if ($i > $j && $n <= $limit && $n % 12 == 11) {
          $this->toggle($isPrime, $n);
        }
      }
    }

    for ($n = 5; $n <= $sqrt; $n++) {
      if (isset($isPrime[$n])) {
        $s = pow($n, 2);

        for ($k = $s; $k <= $limit; $k += $s) {
          $isPrime[$k] = FALSE;
        }
      }
    }

    $primes[2] = 2;
    $primes[3] = 3;

    for ($i = 0; $i < $limit; $i++) {
      if (isset($isPrime[$i]) && $isPrime[$i]) {
        $primes[$i] = $i;
      }
    }

    return $primes;
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
    $this->primes = array_keys($this->findPrimes($this->max));
  }

  /**
   * Get the maximum limit.
   *
   * @return int
   *   The limit.
   */
  public function getMaxLimit() {
    return $this->max;
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
