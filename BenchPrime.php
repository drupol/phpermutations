<?php

require 'vendor/autoload.php';

$max = 100000;
$primesObject = array(
  new \drupol\phpermutations\Iterators\PrimeSieveOfAtkin(),
  new \drupol\phpermutations\Iterators\PrimeSieveOfEratosthenes(),
  new \drupol\phpermutations\Iterators\Prime(),
);

foreach ($primesObject as $prime) {
  echo "*************************************************\n";
  echo "Computing primes with " . get_class($prime) . "()\n";
  $prime->setMaxLimit($max);

  $start = microtime(TRUE);
  $count = $prime->count();
  $end = microtime(TRUE);

  $elapsed = $end - $start;

  echo "Time elapsed to compute " . $count . " primes: " . $elapsed . "\n";
}
