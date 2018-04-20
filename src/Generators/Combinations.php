<?php

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Combinations as CombinationsIterator;

/**
 * Class Combinations.
 *
 *
 * @author Mark Wilson <mark@89allport.co.uk>
 */
class Combinations extends CombinationsIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        return $this->get($this->getDataset(), $this->getLength());
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $data = [];

        foreach ($this->generator() as $value) {
            $data[] = $value;
        }

        return $data;
    }

    /**
     * The generator.
     *
     * @param array $dataset
     *                       The dataset
     * @param int   $length
     *                       The length
     *
     * @codingStandardsIgnoreStart
     *
     * @return \Generator
     * @codingStandardsIgnoreEnd
     */
    protected function get(array $dataset, $length)
    {
        $originalLength = count($dataset);
        $remainingLength = $originalLength - $length + 1;
        for ($i = 0; $i < $remainingLength; ++$i) {
            $current = $dataset[$i];
            if (1 === $length) {
                yield [$current];
            } else {
                $remaining = array_slice($dataset, $i + 1);
                foreach ($this->get($remaining, $length - 1) as $permutation) {
                    array_unshift($permutation, $current);
                    yield $permutation;
                }
            }
        }
    }
}
