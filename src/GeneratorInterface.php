<?php

declare(strict_types = 1);

namespace drupol\phpermutations;

interface GeneratorInterface
{
    /**
     * Get the generator.
     *
     * @return \Generator
     *                    The generator
     */
    public function generator();

    /**
     * Convert the generator into an array.
     *
     * @return array
     */
    public function toArray();
}
