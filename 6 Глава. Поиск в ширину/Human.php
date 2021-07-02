<?php

class Human
{
    private $name;
    private $guitarist;

    public function __construct(string $name, bool $guitarist)
    {
        $this->name = $name;
        $this->guitarist = $guitarist;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isGuitarist(): bool
    {
        return $this->guitarist;
    }
}
