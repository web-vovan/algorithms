<?php

function factorial($i) {
    if ($i <= 1) {
        return 1;
    }

    return $i * factorial($i -1);
}

echo factorial(3); // 6
echo factorial(1); // 1
echo factorial(5); // 120
echo factorial(0); // 1
