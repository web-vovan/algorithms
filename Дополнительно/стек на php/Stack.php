<?php
include './Node.php';

class Stack
{
    /** @var ?Node */
    private $last;

    public function __construct()
    {
        $this->last = null;
    }

    /**
     * добавление в стек
     *
     * @param string $item
     */
    public function put(string $item): void
    {
        $this->last = new Node($item, $this->last);
    }

    /**
     * получение из стека
     *
     * @return string
     */
    public function get(): ?string
    {
        if ($this->isEmpty()) {
            return null;
        }

        $item = $this->last->getItem();
        $this->last = $this->last->getNext();

        return $item;
    }

    /**
     * проверка стека на пустоту
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->last === null;
    }
}
