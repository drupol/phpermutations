<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Cycle.
 *
 * @package drupol\phpermutations\Iterators
 */
class Cycle extends Combinatorics implements \Iterator, \Countable {

  /**
   * The key.
   *
   * @var int
   */
  protected $key = 0;

  /**
   * Cycle constructor.
   *
   * @param array $dataset
   *   The dataset.
   */
  public function __construct(array $dataset = array()) {
    parent::__construct($dataset);
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
  public function current() {
    return $this->dataset[$this->key];
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    $this->key = ($this->key + 1) % $this->datasetCount;
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
  public function valid() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function count() {
    return count($this->getDataset());
  }

}
