<?php

declare(strict_types=1);

namespace drupol\phpermutations;

use Generator;

interface GeneratorInterface
{
    /**
     * Get the generator.
     *
     * @return Generator<int, mixed>
     *                    The generator
     */
    public function generator();

    /**
     * Convert the generator into an array.
     *
     * @return array<int, mixed>
     */
    public function toArray();
}
