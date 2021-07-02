<?php

use Learning\Stack\Stack;

include './Stack.php';
include './Node.php';

/*
 * пример реализации стека на php
 */

$stack = new Stack();

// добавление в стек
$stack->put('one');
$stack->put('two');
$stack->put('three');
$stack->put('four');
$stack->put('five');

// извлекаем данные из стека
while (!$stack->isEmpty()) {
    echo $stack->get() . PHP_EOL;
}
