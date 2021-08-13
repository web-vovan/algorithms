<?php

// максимальный вес рюкзака
$maxWeight = 4;

// гитара
$item1 = [];
$item1['name'] = 'guitar';
$item1['weight'] = 1;
$item1['price'] = 1500;

// магнитофон
$item2 = [];
$item2['name'] = 'player';
$item2['weight'] = 4;
$item2['price'] = 1500;

// ноутбук
$item3 = [];
$item3['name'] = 'notebook';
$item3['weight'] = 3;
$item3['price'] = 2000;

// список вещей, которые можно положить в рюкзак
$items = [$item1, $item2, $item3];

// таблица весов и стоимостей
$table = [];

// разбиваем рюкзак на 4 кг на подрюкзаки по 1 кг
// для каждого вычисляем максимальную стоимость со всеми вариантами
for ($j = 1; $j <= $maxWeight; $j++) {
    foreach ($items as $i => $item) {

        // предыдущий максимум
        $prevMax = ($i - 1 >= 0)
            ? $table[$i - 1][$j]
            : 0;

        // стоимость текущего элемента + стоимость оставшегося пространства
        $priceCurrentPlus = ($i - 1 >= 0 && $j - $item['weight'] > 0)
            ? $item['price'] + $table[$i - 1][$j - $item['weight']]
            : $item['price'];

        $table[$i][$j] = max($prevMax, $priceCurrentPlus);
    }
}

echo $table[count($items) - 1][$maxWeight]; // 3500
