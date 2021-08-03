<?php

// описание графа
$graph = [];

$graph['start'] = [];
$graph['start']['A'] = 6;
$graph['start']['B'] = 2;

$graph['A'] = [];
$graph['A']['fin'] = 1;
$graph['B'] = [];
$graph['B']['A'] = 3;
$graph['B']['fin'] = 5;

$graph['fin'] = [];

// таблица стоимостей
$costs = [];
$costs['A'] = 6;
$costs['B'] = 2;
$costs['fin'] = INF;

// таблица родителей
$parents = [];
$parents['A'] = 'start';
$parents['B'] = 'start';
$parents['fin'] = null;

// таблица уже обработаных узлов
$processed = [];

// находим узел с наименьшей стоимостью среди необработанных
$node = findLowestCostNode($costs);

while (!is_null($node)) {
    $cost = $costs[$node];

    // все соседи узла
    $neighbors = $graph[$node];

    // обновляем стоимости для соседей
    foreach (array_keys($neighbors) as $n) {
        $newCost = $cost + $neighbors[$n];

        // если стоимость ниже, то устанавливаем новую стоимость для узла и меняем родителя
        if ($newCost < $costs[$n]) {
            $costs[$n] = $newCost;
            $parents[$n] = $node;
        }
    }

    // отмечаем узел как обработанный
    array_push($processed, $node);

    $node = findLowestCostNode($costs);
}

print_r($costs['fin']); // 6

// функция поиска узла с наименьшей стоимостью
function findLowestCostNode($costs): ?string {
    global $processed;

    $lowestCost = INF;
    $lowestCostNode = null;

    foreach (array_keys($costs) as $node) {
        $cost = $costs[$node];

        if ($cost < $lowestCost && !in_array($node, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }

    return $lowestCostNode;
}
