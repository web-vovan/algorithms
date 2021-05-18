<?php

// Сортировка выбором

function findSmallestIndex(array $arr): int {
    $smallestIndex = 0;

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] < $arr[$smallestIndex]) {
            $smallestIndex = $i;
        }
    }

    return $smallestIndex;
}

function selectionSort(array $arr): array {
    $result = [];

    $count = count($arr);

    for ($i = 0; $i < $count; $i++) {
        $smallestIndex = findSmallestIndex($arr);
        $result[] = $arr[$smallestIndex];

        unset($arr[$smallestIndex]);
        $arr = array_values($arr);
    }

    return $result;
}

print_r(selectionSort([3,2,4,1,5])); // [1,2,3,4,5]
