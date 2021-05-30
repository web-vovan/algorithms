<?php

// аналог функции array_sum с использованием рекурсии
function custom_array_sum(array $arr): int {
    if (count($arr) === 1) {
        return $arr[0];
    }

    return $arr[0] + custom_array_sum(array_slice($arr, 1));
}

echo custom_array_sum([1,4,3,6]); // 14
