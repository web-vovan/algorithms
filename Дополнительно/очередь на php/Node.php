<?php

namespace Learning\Queue;

class Node
{
    /** @var string */
    private $item;

    /** @var Node */
    private $next;

    public function __construct(string $item, ?Node $next = null)
    {
        $this->item = $item;
        $this->next = $next;
    }

    public function getItem(): string
    {
        return $this->item;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(Node $node): void
    {
        $this->next = $node;
    }
}
