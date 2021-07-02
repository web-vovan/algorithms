<?php

use \Ds\Queue;

include './Human.php';

/*
 * поиск в ширину первого человека из друзей, который умеет играть на гитаре
 *
 *      _1_
 *    /     \
 *   2       3
 *   |     /   \
 *    \   /     4
 *      5
 */

// создаем людей
$vladimir = new Human('vladimir', false);
$dasha = new Human('dasha', false);
$lena = new Human('lena', false);
$ilya = new Human('ilya', true);
$igor = new Human('igor', false);

// нумеруем людей
$peopleMap = [
    1 => $vladimir,
    2 => $dasha,
    3 => $lena,
    4 => $ilya,
    5 => $igor,
];

// создаем граф
$graph = [];
$graph[1] = [2,3];
$graph[2] = [5];
$graph[3] = [4,5];

// функция поиска гитариста
function searchGuitarist($people, $peopleMap): ?string {
    // инициализируем очередь
    $queue = new Queue();

    // добавляем в очередь первого человека
    $queue->push(array_key_first($people));

    // уже проверенные люди
    $searched = [];

    while ($queue->count() > 0) {
        // извлекаем из очереди первого человека
        $firstOfQueue = $queue->pop();

        // проверяем только непроверенных людей
        if (!in_array($firstOfQueue, $searched)) {
            // проверяем умеет ли человек играть на гитаре
            if ($peopleMap[$firstOfQueue]->isGuitarist()) {
                return $peopleMap[$firstOfQueue]->getName();
            } else {
                // если не умеет, то добавляем в очередь всех друзей
                if (array_key_exists($firstOfQueue, $people)) {
                    $queue->push(...$people[$firstOfQueue]);
                }

                // помечаем человека как проверенного
                $searched[] = $firstOfQueue;
            }
        }
    }

    return null;
}

echo searchGuitarist($graph, $peopleMap) . PHP_EOL; // ilya
