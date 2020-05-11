<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use const PHP_INT_MAX;

class Prime extends Iterators
{
    /**
     * The maximum limit.
     *
     * @var int
     */
    protected $max;

    /**
     * The minimum limit.
     *
     * @var int
     */
    protected $min;

    /**
     * Prime constructor.
     */
    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);
        $this->setMinLimit(0);
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        for ($i = $this->key(); $this->getMaxLimit() > $i; ++$i) {
            if ($this->isPrimeNumber($i)) {
                $this->key = $i;

                return $i;
            }
        }

        return $this->getMaxLimit();
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
     * Get the minimum limit.
     *
     * @return int
     *             The limit
     */
    public function getMinLimit()
    {
        return 2 >= $this->min ? 2 : (int) $this->min;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function next()
    {
        ++$this->key;
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
     *
     * @return void
     */
    public function setMaxLimit($max)
    {
        $this->max = $max;
    }

    /**
     * Set the minimum limit.
     *
     * @param int $min
     *                 The limit
     *
     * @return void
     */
    public function setMinLimit($min)
    {
        $this->min = $min;
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function valid()
    {
        return $this->current() < $this->getMaxLimit();
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
