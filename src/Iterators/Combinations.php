<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\IteratorInterface;

/**
 * Class Combinations.
 */
class Combinations extends Combinatorics implements IteratorInterface
{
    /**
     * The values.
     *
     * @var array
     */
    protected $c = [];

    /**
     * The key.
     *
     * @var int
     */
    protected $key = 0;

    /**
     * Combinations constructor.
     *
     * @param array    $dataset
     *                          The dataset
     * @param int|null $length
     *                          The length
     */
    public function __construct(array $dataset = [], $length = null)
    {
        parent::__construct(array_values($dataset), $length);
        $this->rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        $r = [];

        for ($i = 0; $i < $this->length; ++$i) {
            $r[] = $this->dataset[$this->c[$i]];
        }

        return $r;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        if ($this->nextHelper()) {
            ++$this->key;
        } else {
            $this->key = -1;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->c = range(0, $this->length);
        $this->key = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->key >= 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->fact(count($this->getDataset())) /
          ($this->fact($this->getLength()) * $this->fact(count($this->getDataset()) - $this->getLength()));
    }

    /**
     * Custom next() callback.
     *
     * @return bool
     *              Return true or false
     */
    protected function nextHelper()
    {
        $i = $this->length - 1;
        while ($i >= 0 && $this->c[$i] === $this->datasetCount - $this->length + $i) {
            --$i;
        }

        if ($i < 0) {
            return false;
        }

        ++$this->c[$i];
        while ($i++ < $this->length - 1) {
            $this->c[$i] = $this->c[$i - 1] + 1;
        }

        return true;
    }
}
