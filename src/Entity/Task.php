<?php

namespace Todo\Entity;

class Task
{
    public readonly int $id;
    public readonly string $title;
    public readonly string $description;
    //public readonly string $status;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}