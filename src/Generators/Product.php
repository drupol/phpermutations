<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Generators;

use drupol\phpermutations\GeneratorInterface;
use drupol\phpermutations\Iterators\Product as ProductIterator;

/**
 * Class Product.
 */
class Product extends ProductIterator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generator()
    {
        return $this->get($this->getDataset());
    }

    /**
     * Get the generator.
     *
     * @param array $data
     *                    The dataset
     * @codingStandardsIgnoreStart
     *
     * @return \Generator
     *                    The generator
     * @codingStandardsIgnoreEnd
     */
    protected function get(array $data)
    {
        if (!empty($data)) {
            if ($u = \array_pop($data)) {
                foreach ($this->get($data) as $p) {
                    foreach ($u as $v) {
                        yield $p + [\count($p) => $v];
                    }
                }
            }
        } else {
            yield [];
        }
    }
}
