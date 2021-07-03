<?php

namespace Learning\Graph;

class Graph
{
    /** @var array */
    private $edges; // матрица смежности

    public function __construct()
    {
        $this->edges = [];
    }

    /**
     * добавление вершины
     *
     * @param string $node
     */
    public function addNode(string $node): void
    {
        $this->edges[$node] = [];
    }

    /**
     * добавление ребра
     *
     * @param string $node1
     * @param string $node2
     * @param int $length
     */
    public function addEdge(string $node1, string $node2, int $length): void
    {
        $this->edges[$node1][$node2] = $length;
        $this->edges[$node2][$node1] = $length;
    }

    /**
     * перебор всех вершин
     *
     * @return iterable
     */
    public function getNodes(): iterable
    {
        foreach ($this->edges as $node => $edge)
        {
            yield $node;
        }
    }

    /**
     * перебор всех ребер вершины
     *
     * @param string $node1
     * @return iterable
     */
    public function getEdges(string $node1): iterable
    {
        foreach ($this->edges[$node1] as $node2 => $length)
        {
            yield $node2 => $length;
        }
    }
}
