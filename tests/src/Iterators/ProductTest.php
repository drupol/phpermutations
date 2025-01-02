<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Product;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Product::class)]
final class ProductTest extends AbstractTester
{
    public const TYPE = 'product';

    #[DataProvider('dataProvider')]
    public function testProduct($input, $expected)
    {
        $product = new Product($input['dataset']);
        $array = iterator_to_array($product, false);

        self::assertCount($expected['count'], $array);
        self::assertSame($input['dataset'], $product->getDataset());
        self::assertEquals(
            $expected['dataset'],
            $array,
        );
    }
}
