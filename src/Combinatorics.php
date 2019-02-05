<?php

declare(strict_types = 1);

namespace drupol\phpermutations;

/**
 * Class Combinatorics.
 */
abstract class Combinatorics implements \Countable
{
    /**
     * The dataset.
     *
     * @var array
     */
    protected $dataset;

    /**
     * The number of values in the dataset.
     *
     * @var int
     */
    protected $datasetCount;

    /**
     * The key.
     *
     * @var int
     */
    protected $key;

    /**
     * The length.
     *
     * @var int
     */
    protected $length;

    /**
     * Combinatorics constructor.
     *
     * @param array    $dataset
     *                          The dataset
     * @param null|int $length
     *                          The length
     */
    public function __construct(array $dataset = [], $length = null)
    {
        $this->setDataset($dataset);
        $this->datasetCount = \count($this->dataset);
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
        return \count($this->toArray());
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
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * Set the dataset.
     *
     * @param array $dataset
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
     * @param int $length
     *                    The length
     *
     * @return $this
     */
    public function setLength($length = null)
    {
        $length = $length ?? $this->datasetCount;
        $this->length = ($length > $this->datasetCount) ? $this->datasetCount : $length;

        return $this;
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
