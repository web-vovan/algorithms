<?php

// рекурсивный аналог функции count
function custom_count(array $arr): int {
    if (!isset($arr[0])) {
        return 0;
    }

    return 1 + custom_count(array_slice($arr, 1));
}

echo custom_count([2,4,3]); // 3
echo custom_count([]); // 0
