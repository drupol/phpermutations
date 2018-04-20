<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Prime.
 */
class Prime extends Combinatorics implements IteratorInterface
{
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
     * Prime constructor.
     */
    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);
        $this->setMinLimit(0);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        for ($i = $this->key(); $i < $this->getMaxLimit(); ++$i) {
            if ($this->isPrimeNumber($i)) {
                $this->key = $i;

                return $i;
            }
        }

        return $this->getMaxLimit();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->current() < $this->getMaxLimit();
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->key = $this->getMinLimit();
    }

    /**
     * Count elements of an object.
     *
     * @return int
     *             The number of element
     */
    public function count()
    {
        return count($this->toArray());
    }

    /**
     * Convert the iterator into an array.
     *
     * @return array
     *               The elements
     */
    public function toArray()
    {
        $data = [];

        for ($this->rewind(); $this->valid(); $this->next()) {
            $data[] = $this->current();
        }

        return $data;
    }

    /**
     * Set the maximum limit.
     *
     * @param int $max
     *                 The limit
     */
    public function setMaxLimit($max)
    {
        $this->max = $max;
    }

    /**
     * Get the maximum limit.
     *
     * @return int
     *             The limit
     */
    public function getMaxLimit()
    {
        return intval($this->max);
    }

    /**
     * Set the minimum limit.
     *
     * @param int $min
     *                 The limit
     */
    public function setMinLimit($min)
    {
        $this->min = $min;
    }

    /**
     * Get the minimum limit.
     *
     * @return int
     *             The limit
     */
    public function getMinLimit()
    {
        return $this->min <= 2 ? 2 : intval($this->min);
    }

    /**
     * Test if a number is prime or not.
     *
     * @param int $number
     *                    The number to test
     *
     * @return bool
     *              The true if the number is prime, false otherwise
     */
    protected function isPrimeNumber($number)
    {
        $number = abs($number);

        // 2 is an exception.
        if (2 === $number) {
            return true;
        }

        // Check if number is even.
        if (!($number & 1)) {
            return false;
        }

        $sqrtNumber = sqrt($number);
        for ($divisor = 3; $divisor <= $sqrtNumber; $divisor += 2) {
            if (0 === $number % $divisor) {
                return false;
            }
        }

        return true;
    }
}
