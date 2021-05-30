<?php

/*
 * алгоритм Евклида для нахождения наибольшего общего делителя двух чисел
 * также может использоваться на нахождения стороны наибольшего квадрата
 * при делении произвольного участка на равные квадраты
*/
function euclidean_algorithm(int $a, int $b): int {
    if ($a > $b) {
        if ($a % $b === 0) {
            return $b;
        }

        return euclidean_algorithm($a % $b, $b);
    }

    if ($a < $b) {
        if ($b % $a === 0 ) {
            return $a;
        }

        return euclidean_algorithm($a, $b % $a);
    }
}

echo euclidean_algorithm(9, 12); // 3
echo euclidean_algorithm(17, 88); // 1
echo euclidean_algorithm(1680, 640); // 80
