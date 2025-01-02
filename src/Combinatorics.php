<?php

declare(strict_types=1);

namespace drupol\phpermutations;

use function count;

abstract class Combinatorics
{
    protected $dataset;

    protected int $datasetCount;

    protected $length;

    public function __construct(array $dataset = [], ?int $length = null)
    {
        $this->setDataset($dataset);
        $this->datasetCount = count($this->dataset);
        $this->setLength($length);
    }

    public function getDataset(): array
    {
        return $this->dataset;
    }

    public function getLength(): int
    {
        return (int) $this->length;
    }

    public function setDataset(array $dataset = []): Combinatorics
    {
        $this->dataset = $dataset;

        return $this;
    }

    public function setLength(?int $length = null): Combinatorics
    {
        $length = $length ?? $this->datasetCount;
        $this->length = (abs($length) > $this->datasetCount) ? $this->datasetCount : $length;

        return $this;
    }

    /**
     * Compute the factorial of an integer.
     *
     * @param int $n
     *                   The number to get its factorial
     * @param int $total
     *                   The total
     *
     * @return int
     *             The factorial of $n
     */
    protected function fact(int $n, int $total = 1): int
    {
        return (2 > $n) ? $total : $this->fact($n - 1, $total * $n);
    }
}
