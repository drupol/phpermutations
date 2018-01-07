<?php

/**
 * Find the number pi (3.1415926535898 => M_PI constant in PHP).
 *
 * π/4 = arctan(1/2) + arctan(1/5) + arctan(1/13) + arctan(1/21) + ...
 *
 * You'll have already noticed the Fibonacci numbers here.
 * However, not all the Fibonacci numbers appear on the left hand sides.
 * For instance, we have no expansion for arctan(1/5) nor for arctan(1/13).
 * Only the even numbered Fibonacci terms seem to be expanded:
 * (F2=1, F4=3, F6=8, F8=21, ...)
 *
 * To find the number pi using Fibonacci:
 *  1: Generate a set of size S of Fibonacci numbers,
 *  2: Apply on each item of the set a function that will compute the inverse
 *     of the item,
 *  3: Apply on each item of the set the atan() function and multiply by 4,
 *  4: Filter out values where the key value is odd,
 *  3: Sum all the terms of the array.
 *
 * Requirements:
 *   - https://packagist.org/packages/drupol/phpermutations
 *
 * Install:
 *   1: Git clone phpermutations,
 *   2: Run composer install,
 *   3: Create this file at the root of the project,
 *   4: Run php pi.php.
 */
include './vendor/autoload.php';

$Fibonacci = new \drupol\phpermutations\Generators\Fibonacci();

for ($i = 2; $i <= 50; $i = $i + 2) {
    $gen = $Fibonacci->generator();

    $input = [];
    for ($s = 0; $s <= $i; ++$s) {
        $input[] = $gen->current();
        $gen->next();
    }

    $input = array_sum(array_filter(array_map(function ($item) {
        return 4 * atan(1 / $item);
    }, array_slice($input, 3)), function ($key) {
        return !($key % 2);
    }, ARRAY_FILTER_USE_KEY));

    echo '**********************************************************' . "\n";
    echo 'Size: ' . $i . "\n";
    echo 'Pi estimation: ' . $input . "\n";
}
