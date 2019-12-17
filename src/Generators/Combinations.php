<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Combinations as CombinationsIterator;
use Generator;

use function array_slice;
use function count;

/**
 * Class Combinations.
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
     * The generator.
     *
     * @param array<int, mixed> $dataset
     *                       The dataset
     * @param int   $length
     *                       The length
     *
     * @return Generator<array>
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
