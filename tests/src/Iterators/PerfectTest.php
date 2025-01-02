<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Perfect;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Perfect::class)]
final class PerfectTest extends AbstractTester
{
    public const TYPE = 'perfect';

    #[DataProvider('dataProvider')]
    public function testPerfect($input, $expected)
    {
        $perfect = new Perfect();
        $perfect->setMinLimit($input['min']);
        $perfect->setMaxLimit($input['max']);
        $array = iterator_to_array($perfect, false);

        if (2 > $input['min']) {
            self::assertSame(2, $perfect->getMinLimit());
        } else {
            self::assertSame($input['min'], $perfect->getMinLimit());
        }
        self::assertSame($input['max'], $perfect->getMaxLimit());
        self::assertSame($input['max'], $perfect->getMaxLimit());
        self::assertCount($expected['count'], $array);
        self::assertEquals(
            $expected['dataset'],
            $array,
        );
    }
}
