<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Product;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class ProductTest.
 *
 * @internal
 * @coversNothing
 */
final class ProductTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'product';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testProduct($input, $expected)
    {
        $product = new Product($input['dataset']);

        $this->assertSame($input['dataset'], $product->getDataset());
        $this->assertEquals(
            $expected['dataset'],
            $product->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
        $this->assertSame($expected['count'], $product->count());
    }
}
