<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Product;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class ProductTest.
 *
 * @internal
 * @covers \drupol\phpermutations\Generators\Product
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

        static::assertSame($input['dataset'], $product->getDataset());
        static::assertSame($expected['count'], $product->count());
        static::assertEquals(
            $expected['dataset'],
            $product->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
    }
}
