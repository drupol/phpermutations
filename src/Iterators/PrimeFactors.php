<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use function count;

class PrimeFactors extends Iterators
{
    /**
     * The prime factors.
     *
     * @var int[]
     */
    protected $factors;

    /**
     * The number.
     *
     * @var int
     */
    protected $number;

    /**
     * Count elements of an object.
     *
     * @return int
     *             The number of element
     */
    public function count(): int
    {
        return count($this->factors);
    }

    /**
     * {@inheritdoc}
     */
    public function current(): mixed
    {
        return current($this->factors);
    }

    /**
     * Get the number.
     *
     * @return int
     *             The number
     */
    public function getNumber(): int
    {
        return (int) $this->number;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function next(): void
    {
        ++$this->key;
        next($this->factors);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind(): void
    {
        $this->key = 0;
    }

    /**
     * Set the number.
     *
     * @param int $number
     *                    The number
     *
     * @return void
     */
    public function setNumber($number): void
    {
        $this->number = $number;
        $this->factors = $this->getFactors($this->getNumber());
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->factors[$this->key()]);
    }

    /**
     * Compute the prime factors of the number.
     *
     * @param mixed $number
     *
     * @return int[]
     *               The factors
     */
    private function getFactors($number): array
    {
        $factors = [];

        for ($i = 2; $number / $i >= $i; ++$i) {
            while (0 === $number % $i) {
                $factors[] = $i;
                $number /= $i;
            }
        }

        if (1 < $number) {
            $factors[] = $number;
        }

        return $factors;
    }
}
