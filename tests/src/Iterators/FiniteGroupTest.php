<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\FiniteGroup;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(FiniteGroup::class)]
final class FiniteGroupTest extends AbstractTester
{
    public const TYPE = 'finitegroup';

    #[DataProvider('dataProvider')]
    public function testFiniteGroup($input, $expected)
    {
        $prime = new FiniteGroup();
        $prime->setSize($input['size']);
        $array = iterator_to_array($prime, false);

        self::assertCount($expected['count'], $array);
        self::assertEquals(
            $expected['dataset'],
            $array,
        );
    }
}
