<?php

use Learning\Graph\Graph;
use Learning\Queue\Queue;
use Learning\Stack\Stack;

include './Graph.php';
include '../очередь на php/Queue.php';
include '../стек на php/Stack.php';

$graph = new Graph();

// добавляем вершины
$graph->addNode('start');
$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('end');

// добавляем ребра
$graph->addEdge('start', 'A', 6);
$graph->addEdge('start', 'B', 2);
$graph->addEdge('A', 'B', 3);
$graph->addEdge('A', 'end', 1);
$graph->addEdge('B', 'end', 5);

// перечисление всех вершин
foreach ($graph->getNodes() as $node) {
    echo $node . PHP_EOL;
}

// все ребра для вершины start
$node1 = 'start';
foreach ($graph->getEdges($node1) as $node2 => $length) {
    echo $node1 . ' - ' . $node2 . ': ' . $length . PHP_EOL;
}
