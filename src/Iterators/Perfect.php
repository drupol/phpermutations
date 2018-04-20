<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Perfect.
 */
class Perfect extends Combinatorics implements IteratorInterface
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
     * Perfect constructor.
     */
    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);
        $this->setMinLimit(2);
        parent::__construct([], null);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        for ($i = $this->key(); $i < $this->getMaxLimit(); ++$i) {
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
    public function next()
    {
        ++$this->key;
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
        return (int) $this->max;
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
        return $this->min < 2 ? 2 : $this->min;
    }

    /**
     * Test if a number is perfect or not.
     *
     * Source: http://iceyboard.no-ip.org/projects/code/php/perfect_number/
     *
     * @param int $number
     *                    The number to test
     *
     * @return bool
     *              The true if the number is perfect, false otherwise
     */
    protected function isPerfectNumber($number)
    {
        $d = 0;
        $max = sqrt($number);
        for ($n = 2; $n <= $max; ++$n) {
            if (!($number % $n)) {
                $d += $n;
                if ($n !== $number / $n) {
                    $d += $number / $n;
                }
            }
        }

        return ++$d === $number;
    }
}
