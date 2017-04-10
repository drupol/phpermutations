<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Permutations.
 *
 * @package drupol\phpermutations\Generators
 *
 * Inspired by the work of Mark Wilson <mark@89allport.co.uk>
 */
class Permutations extends Combinatorics
{

  /**
   * The combinations generator.
   *
   * @var \drupol\phpermutations\Generators\Combinations
   */
    protected $combinations;

  /**
   * Combinatorics constructor.
   *
   * @param array $dataset
   *   The dataset.
   * @param int|null $length
   *   The length.
   */
    public function __construct(array $dataset = array(), $length = null)
    {
        parent::__construct($dataset, $length);
        $this->combinations = new Combinations($dataset, $this->getLength());
    }

  /**
   * Alias of the get() method.
   *
   * @codingStandardsIgnoreStart
   * @return \Generator
   * @codingStandardsIgnoreEnd
   */
    public function generator()
    {
        foreach ($this->combinations->generator() as $combination) {
            foreach ($this->get($combination) as $current) {
                yield $current;
            }
        }
    }

  /**
   * The permutations generator.
   *
   * @param array $dataset
   *   The dataset.
   *
   * @codingStandardsIgnoreStart
   * @return \Generator
   * @codingStandardsIgnoreEnd
   */
    protected function get(array $dataset)
    {
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

  /**
   * Convert the generator into an array.
   *
   * @return array
   *   The elements.
   */
    public function toArray()
    {
        $data = array();

        foreach ($this->generator() as $value) {
            $data[] = $value;
        }

        return $data;
    }

  /**
   * {@inheritdoc}
   */
    public function count()
    {
        return $this->combinations->count() * $this->fact($this->getLength());
    }
}
