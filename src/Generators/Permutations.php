<?php

declare(strict_types=1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\Combinatorics;
use drupol\phpermutations\GeneratorInterface;
use Generator;

use function count;

class Permutations extends Combinatorics implements GeneratorInterface
{
    /**
     * The combinations generator.
     *
     * @var \drupol\phpermutations\Generators\Combinations
     */
    protected $combinations;

    /**
     * Permutations constructor.
     *
     * @param array<int, mixed> $dataset
     *                          The dataset
     * @param int|null $length
     *                          The length
     */
    public function __construct(array $dataset = [], $length = null)
    {
        parent::__construct($dataset, $length);
        $this->combinations = new Combinations($dataset, $this->getLength());
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->combinations->count() * $this->fact($this->getLength());
    }

    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        foreach ($this->combinations->generator() as $combination) {
            foreach ($this->get($combination) as $current) {
                yield $current;
            }
        }
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
     * The permutations generator.
     *
     * @param array<int, mixed> $dataset
     *                       The dataset
     *
     * @return Generator<array>
     */
    protected function get(array $dataset)
    {
        foreach ($dataset as $key => $firstItem) {
            $remaining = $dataset;

            array_splice($remaining, $key, 1);

            if (0 === count($remaining)) {
                yield [$firstItem];

                continue;
            }

            foreach ($this->get($remaining) as $permutation) {
                array_unshift($permutation, $firstItem);

                yield $permutation;
            }
        }
    }
}
