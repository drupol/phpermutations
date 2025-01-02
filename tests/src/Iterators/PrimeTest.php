<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Prime;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Prime::class)]
final class PrimeTest extends AbstractTester
{
    public const TYPE = 'prime';

    #[DataProvider('dataProvider')]
    public function testPrime($input, $expected)
    {
        $prime = new Prime();
        $prime->setMinLimit($input['min']);
        $prime->setMaxLimit($input['max']);
        $array = iterator_to_array($prime, false);

        if (2 > $input['min']) {
            self::assertSame(2, $prime->getMinLimit());
        } else {
            self::assertSame($input['min'], $prime->getMinLimit());
        }
        self::assertSame($input['max'], $prime->getMaxLimit());
        self::assertCount($expected['count'], $array);
        self::assertEquals(
            $expected['dataset'],
            $array,
        );
    }
}
