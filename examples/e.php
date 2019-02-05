<?php

declare(strict_types = 1);
/**
 * Find the number e (2.7182818284590452354 => M_E constant in PHP).
 *
 * To find the number e using permutations:
 *  1: Generate a set of size S of random values,
 *  2: Find the number of permutations of that set, let it be #P0,
 *  3: With all the permutations of this set, count the number of permutation
 *     (#P1) that doesn't share any single item with the original input set,
 *  4: Divide #P0 by #P1,
 *  5: Restart at 1 and increase the size of the set.
 *
 * Requirements:
 *   - https://packagist.org/packages/drupol/phpermutations
 *
 * Install:
 *   1: Git clone phpermutations,
 *   2: Run composer install,
 *   3: Create this file at the root of the project,
 *   4: Run php e.php.
 */
include './vendor/autoload.php';

for ($i = 2; 15 > $i; ++$i) {
    $input = \range(1, $i);
    $size = $i;

    echo '**********************************************************' . "\n";
    echo 'Size: ' . $i . "\n";

    $Permutations = new \drupol\phpermutations\Generators\Permutations($input, $size);

    $j = 0;
    foreach ($Permutations->generator() as $permutation) {
        if (!($array3 = \array_intersect_assoc($input, $permutation))) {
            ++$j;
        }
    }

    echo 'Number of permutations (#P0): ' . $Permutations->count() . "\n";
    echo 'Number of permutations without item at the same place (#P1): ' . $j . "\n";
    echo '(#P0) / (#P1): ' . $Permutations->count() / $j . "\n";
}
