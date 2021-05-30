<?php

// быстрая сортировка

function quick_sort(array $arr): array {
    if (count($arr) < 2) {
        return $arr;
    }

    $minArr = [];
    $maxArr = [];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $arr[0]) {
            $minArr[] = $arr[$i];
        } else {
            $maxArr[] = $arr[$i];
        }
    }

    return array_merge(quick_sort($minArr), array_slice($arr, 0, 1), quick_sort($maxArr));
}

print_r(quick_sort([3,5,1,2,4])); // [1,2,3,4,5]
