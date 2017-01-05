<?php

namespace drupol\phpermutations\Tests\Generators;

use drupol\phpermutations\Generators\Prime;
use PHPUnit\Framework\TestCase;

/**
 * Class PrimeTest.
 *
 * @package drupol\phpermutations\Tests\Generators
 */
class PrimeTest extends TestCase {

  /**
   * @dataProvider simpleValueProvider
   */
  public function testPrime($input, $expected) {
    $prime = new Prime();
    $prime->setMinLimit($input['min']);
    $prime->setMaxLimit($input['max']);

    if ($input['min'] < 2) {
      $this->assertEquals(2, $prime->getMinLimit());
    }
    else {
      $this->assertEquals($input['min'], $prime->getMinLimit());
    }
    $this->assertEquals($input['max'], $prime->getMaxLimit());

    $this->assertEquals($expected['count'], $prime->count());
    $this->assertEquals($expected['dataset'], $prime->toArray(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = TRUE);
  }

  /**
   *
   */
  public function simpleValueProvider() {
    return [
      [
        'input' => [
          'min' => 1,
          'max' => 1000,
        ],
        'output' => [
          'dataset' => [
            2,
            3,
            5,
            7,
            11,
            13,
            17,
            19,
            23,
            29,
            31,
            37,
            41,
            43,
            47,
            53,
            59,
            61,
            67,
            71,
            73,
            79,
            83,
            89,
            97,
            101,
            103,
            107,
            109,
            113,
            127,
            131,
            137,
            139,
            149,
            151,
            157,
            163,
            167,
            173,
            179,
            181,
            191,
            193,
            197,
            199,
            211,
            223,
            227,
            229,
            233,
            239,
            241,
            251,
            257,
            263,
            269,
            271,
            277,
            281,
            283,
            293,
            307,
            311,
            313,
            317,
            331,
            337,
            347,
            349,
            353,
            359,
            367,
            373,
            379,
            383,
            389,
            397,
            401,
            409,
            419,
            421,
            431,
            433,
            439,
            443,
            449,
            457,
            461,
            463,
            467,
            479,
            487,
            491,
            499,
            503,
            509,
            521,
            523,
            541,
            547,
            557,
            563,
            569,
            571,
            577,
            587,
            593,
            599,
            601,
            607,
            613,
            617,
            619,
            631,
            641,
            643,
            647,
            653,
            659,
            661,
            673,
            677,
            683,
            691,
            701,
            709,
            719,
            727,
            733,
            739,
            743,
            751,
            757,
            761,
            769,
            773,
            787,
            797,
            809,
            811,
            821,
            823,
            827,
            829,
            839,
            853,
            857,
            859,
            863,
            877,
            881,
            883,
            887,
            907,
            911,
            919,
            929,
            937,
            941,
            947,
            953,
            967,
            971,
            977,
            983,
            991,
            997,
          ],
          'count' => 168,
        ],
      ],
      [
        'input' => [
          'min' => 50,
          'max' => 100,
        ],
        'output' => [
          'dataset' => [
            53,
            59,
            61,
            67,
            71,
            73,
            79,
            83,
            89,
            97,
          ],
          'count' => 10,
        ],
      ],
    ];
  }

}
