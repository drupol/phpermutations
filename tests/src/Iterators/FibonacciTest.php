<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Fibonacci;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Fibonacci::class)]
final class FibonacciTest extends AbstractTester
{
    public const TYPE = 'fibonacci';

    #[DataProvider('dataProvider')]
    public function testFibonacci($input, $expected)
    {
        $prime = new Fibonacci();
        $prime->setMaxLimit(1000);

        $array = iterator_to_array($prime, false);

        self::assertCount($expected['count'], $array);
        self::assertEquals(
            $expected['dataset'],
            $array,
        );
    }
}
