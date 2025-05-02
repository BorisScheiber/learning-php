<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([
    1, 8, 3, 4, 5, 6, 7, 8, 9, 10
]);

$numbersMultiplied = $numbers->map(function ($item) {
 return $item * 2;
});

var_dump($numbersMultiplied);