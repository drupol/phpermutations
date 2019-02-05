<?php

declare(strict_types = 1);

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\NGrams;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class NgramsTest.
 *
 * @internal
 * @coversNothing
 */
final class NgramsTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'ngrams';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testNgrams($input, $expected)
    {
        $ngrams = new NGrams($input['dataset'], $input['length']);

        for ($i = 0; $i < $input['turn']; ++$i) {
            $ngrams->next();
        }
        $this->assertSame($expected['current'], $ngrams->current());

        $this->assertSame($input['dataset'], $ngrams->getDataset());
        $this->assertSame($expected['count'], $ngrams->count());
    }
}
