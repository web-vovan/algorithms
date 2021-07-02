<?php

namespace Learning\Queue;

class Queue
{
    /** @var Node */
    private $first;

    /** @var Node */
    private $last;

    public function __construct()
    {
        $this->first = null;
        $this->last = null;
    }

    /**
     * добавление в очередь
     *
     * @param string $item
     */
    public function put(string $item): void
    {
        $node = new Node($item);

        if ($this->last) {
            $this->last->setNext($node);
            $this->last = $node;
        } else {
            $this->first = $node;
            $this->last = $node;
        }
    }

    /**
     * выбор элемента из очереди
     *
     * @return string|null
     */
    public function get(): ?string
    {
        if ($this->isEmpty()) {
            return null;
        }

        $item = $this->first->getItem();
        $this->first = $this->first->getNext();

        return $item;
    }

    /**
     * проверка очереди на пустоту
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->first === null;
    }
}
