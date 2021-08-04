<?php
/*
 * Задача: найти оптимальный набор радиостанций,
 * который покрывает все перечисленные штаты
 */

// список штатов
$states_needed = ['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az'];

// список станций
$stations = [];
$stations['kone'] = ['id', 'nv', 'ut'];
$stations['ktwo'] = ['wa', 'id', 'mt'];
$stations['kthree'] = ['or', 'nv', 'ca'];
$stations['kfour'] = ['nv', 'ut'];
$stations['kfive'] = ['ca', 'az'];

// итоговый набор станций
$final_stations = [];

while ($states_needed) {
    // лучшая станция
    $best_station = null;

    // покрытые штаты
    $states_covered = [];

    foreach (array_keys($stations) as $station) {
        // покрытие станцией штатов (схождение массивов)
        $covered = array_intersect($states_needed, $stations[$station]);

        // если станция покрывает больше штатов
        if (count($covered) > count($states_covered)) {
            $best_station = $station;
            $states_covered = $covered;
        }
    }

    $states_needed = array_diff($states_needed, $states_covered);
    array_push($final_stations, $best_station);
}

print_r($final_stations);

/*
[
    [0] => kone
    [1] => ktwo
    [2] => kthree
    [3] => kfive
]
 */
