<?php

declare(strict_types=1);

namespace drupol\phpermutations\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Class AbstractTest.
 *
 * @internal
 */
abstract class AbstractTester extends TestCase
{
    /**
     * The type.
     */
    public const TYPE = null;

    /**
     * The data provider.
     *
     * @return array
     *               The test input values and their expected output
     */
    public static function dataProvider()
    {
        $fixtures = self::fixtureProvider();

        if (isset($fixtures[static::TYPE]['content'])) {
            return $fixtures[static::TYPE]['content'];
        }

        return [];
    }

    /**
     * Return component fixtures.
     *
     * @return array
     *               List of component fixtures
     */
    public static function fixtureProvider()
    {
        $data = [];

        $path = realpath(__DIR__ . '/../fixtures');

        if (false !== $path) {
            foreach ((new Finder())->files()->in($path) as $file) {
                $type = basename($file->getRelativePathname(), '.yml');
                $data[$type] = [
                    'file' => $file->getRelativePathname(),
                    'type' => basename($file->getRelativePathname(), '.yml'),
                    'content' => Yaml::parse($file->getContents()),
                ];
            }
        }

        return $data;
    }
}
