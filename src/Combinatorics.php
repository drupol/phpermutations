<?php

declare(strict_types=1);

namespace drupol\phpermutations;

use function count;

abstract class Combinatorics
{
    /**
     * The dataset.
     *
     * @var array<int, mixed>
     */
    protected $dataset;

    /**
     * The number of values in the dataset.
     *
     * @var int
     */
    protected $datasetCount;

    /**
     * The length.
     *
     * @var int
     */
    protected $length;

    /**
     * Combinatorics constructor.
     *
     * @param array<int, mixed>    $dataset
     *                          The dataset
     * @param int|null $length
     *                          The length
     */
    public function __construct(array $dataset = [], $length = null)
    {
        $this->setDataset($dataset);
        $this->datasetCount = count($this->dataset);
        $this->setLength($length);
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
     * Get the dataset.
     *
     * @return mixed[]
     *                 The dataset
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * Get the length.
     *
     * @return int
     *             The length
     */
    public function getLength()
    {
        return (int) $this->length;
    }

    /**
     * Set the dataset.
     *
     * @param array<int, mixed> $dataset
     *                       The dataset
     *
     * @return $this
     */
    public function setDataset(array $dataset = [])
    {
        $this->dataset = $dataset;

        return $this;
    }

    /**
     * Set the length.
     *
     * @param int|null $length
     *                    The length
     *
     * @return $this
     */
    public function setLength($length = null)
    {
        $length = $length ?? $this->datasetCount;
        $this->length = (abs($length) > $this->datasetCount) ? $this->datasetCount : $length;

        return $this;
    }

    /**
     * @return array<int, mixed>
     */
    public function toArray()
    {
        return [];
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
    protected function fact($n, $total = 1)
    {
        return (2 > $n) ? $total : $this->fact($n - 1, $total * $n);
    }
}
