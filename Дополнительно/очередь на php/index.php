<?php

use Learning\Queue\Queue;

include './Node.php';
include './Queue.php';

$queue = new Queue();

// добавляем элемента в очередь
$queue->put('one');
$queue->put('two');
$queue->put('three');
$queue->put('four');
$queue->put('five');

// достаем элементы из очереди
while (!$queue->isEmpty()) {
    echo $queue->get() . PHP_EOL;
}
