<?php

// Бинарный поиск

function binary_search(array $arr, int $int) {
    $lower_index = 0;
    $upper_index = count($arr) - 1;

    while ($lower_index <= $upper_index) {
        $middle_index = floor(($lower_index + $upper_index) / 2);

        if ($arr[$middle_index] === $int) {
            return $middle_index;
        } else if ($arr[$middle_index] < $int) {
            $lower_index = $middle_index + 1;
        } else {
            $upper_index = $middle_index - 1;
        }
    }

    return null;
}

echo binary_search([1,3,5,7,9], 3) . PHP_EOL; // 1
echo binary_search([1,3,5,7,9], 10) . PHP_EOL; // null
echo binary_search([1,3,5,7,9], 9) . PHP_EOL; // 4
