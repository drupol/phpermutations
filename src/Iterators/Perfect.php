<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use const PHP_INT_MAX;

class Perfect extends Iterators
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
        for ($i = $this->key(); $this->getMaxLimit() > $i; ++$i) {
            if ($this->isPerfectNumber($i)) {
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
        return 2 > $this->min ? 2 : $this->min;
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

                if ($number / $n !== $n) {
                    $d += $number / $n;
                }
            }
        }

        return ++$d === $number;
    }
}
