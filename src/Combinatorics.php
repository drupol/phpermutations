<?php

namespace drupol\phpermutations;

/**
 * Class Combinatorics.
 *
 * @package drupol\phpermutations
 */
abstract class Combinatorics implements \Countable {

  /**
   * @var array
   */
  protected $dataset;

  /**
   * @var int
   */
  protected $datasetCount;

  /**
   * @var int
   */
  protected $length;

  /**
   * Combinatorics constructor.
   *
   * @param array $dataset
   * @param int|null $length
   */
  public function __construct(array $dataset = array(), $length = NULL) {
    $this->setDataset($dataset);
    $this->datasetCount = count($this->dataset);
    $this->setLength($length);
  }

  /**
   * @param int $length
   *
   * @return $this
   */
  public function setLength($length = NULL) {
    $length = is_null($length) ? $this->datasetCount : $length;
    $this->length = ($length > $this->datasetCount) ? $this->datasetCount : $length;

    return $this;
  }

  /**
   * @return int
   */
  public function getLength() {
    return (int) $this->length;
  }

  /**
   * @param array $dataset
   *
   * @return $this
   */
  public function setDataset(array $dataset = array()) {
    $this->dataset = $dataset;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getDataset() {
    return $this->dataset;
  }

  /**
   * Compute the factorial of an integer.
   *
   * @param $n
   * @param int $total
   *
   * @return int
   */
  protected function fact($n, $total = 1) {
    return ($n < 2) ? $total : $this->fact($n - 1, $total * $n);
  }

}
