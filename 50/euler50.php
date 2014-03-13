<?php
ini_set('memory_limit', '256M');

$primes = file_get_contents('./primes.json');
$primes = json_decode($primes, TRUE);

$limit = 1000000;

$keyed_primes = array();
foreach ($primes as $prime) {
  $keyed_primes[$prime] = 1;

  if ($prime > $limit) {
    break;
  }
}

$possibility = 0;
$max_number_of_primes = 0;

$start = 0;
while($primes[$start] < $limit) {
  $sum = 0;
  $number_of_primes_added = 0;
  $pos = $start;
  while ($sum < $limit) {
    $sum += $primes[$pos];

    if (!empty($keyed_primes[$sum])) {
      if ($number_of_primes_added > $max_number_of_primes) {
        $max_number_of_primes = $number_of_primes_added;
        $possibility = $sum;
      }
    }

    $pos++;
    $number_of_primes_added++;
  }

  $start++;
}

echo $possibility;
