<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\NGrams;
use drupol\phpermutations\Iterators\Shift;
use drupol\phpermutations\Tests\AbstractTester;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(NGrams::class)]
#[CoversClass(Shift::class)]
final class NgramsTest extends AbstractTester
{
    public const TYPE = 'ngrams';

    #[DataProvider('dataProvider')]
    public function testNgrams($input, $expected)
    {
        $ngrams = new NGrams($input['dataset'], $input['length']);

        for ($i = 0; $i < $input['turn']; ++$i) {
            $ngrams->next();
        }

        self::assertSame($expected['current'], $ngrams->current());
        self::assertSame($input['dataset'], $ngrams->getDataset());
    }
}
