<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\PrimeFactors;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(PrimeFactors::class)]
final class PrimeFactorsTest extends AbstractTester
{
    public const TYPE = 'primefactors';

    #[DataProvider('dataProvider')]
    public function testPrimeFactors($input, $expected)
    {
        $prime = new PrimeFactors();
        $prime->setNumber($input['number']);
        $array = iterator_to_array($prime, false);

        self::assertCount($expected['count'], $array);
        self::assertEquals(
            $expected['dataset'],
            $array,
        );
    }
}
