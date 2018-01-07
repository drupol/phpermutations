<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class PrimeFactors.
 */
class PrimeFactors extends Combinatorics implements \Iterator, \Countable
{
    /**
     * The number.
     *
     * @var int
     */
    protected $number;

    /**
     * The key.
     *
     * @var int
     */
    protected $key;

    /**
     * The prime factors.
     *
     * @var int[]
     */
    protected $factors;

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->factors);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->key;
        next($this->factors);
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
        return isset($this->factors[$this->key()]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->key = 0;
    }

    /**
     * Count elements of an object.
     *
     * @return int
     *             The number of element
     */
    public function count()
    {
        return count($this->factors);
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
     * Set the number.
     *
     * @param int $number
     *                    The number
     */
    public function setNumber($number)
    {
        $this->number = $number;
        $this->factors = $this->getFactors($this->getNumber());
    }

    /**
     * Get the number.
     *
     * @return int
     *             The number
     */
    public function getNumber()
    {
        return intval($this->number);
    }

    /**
     * Compute the prime factors of the number.
     *
     * @param mixed $number
     *
     * @return int[]
     *               The factors
     */
    private function getFactors($number)
    {
        if ($number <= 0) {
            $factors = [];
        }

        for ($i = 2; $i <= $number / $i; ++$i) {
            while (0 === $number % $i) {
                $factors[] = $i;
                $number /= $i;
            }
        }

        if ($number > 1) {
            $factors[] = $number;
        }

        return $factors;
    }
}
