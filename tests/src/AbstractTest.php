<?php

namespace drupol\phpermutations\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Class AbstractTest.
 *
 * @package drupol\phpermutations\Tests
 */
abstract class AbstractTest extends TestCase
{

  /**
   * The type.
   */
    const TYPE = null;

  /**
   * The data provider.
   *
   * @return array
   *   The test input values and their expected output.
   */
    public function dataProvider()
    {
        $fixtures = $this->fixtureProvider();
        if ($this::TYPE !== null && $fixtures[$this::TYPE]['content']) {
            return $fixtures[$this::TYPE]['content'];
        }
        return array();
    }

  /**
   * Return component fixtures.
   *
   * @return array
   *   List of component fixtures.
   */
    public function fixtureProvider()
    {
        $data = [];

        $finder = new Finder();
        $finder->files()->in(realpath(__DIR__ . '/../fixtures'));
        foreach ($finder as $file) {
            $type = basename($file->getRelativePathname(), '.yml');
            $data[$type] = [
            'file' => $file->getRelativePathname(),
            'type' => basename($file->getRelativePathname(), '.yml'),
            'content' => Yaml::parse($file->getContents()),
            ];
        }
        return $data;
    }
}
