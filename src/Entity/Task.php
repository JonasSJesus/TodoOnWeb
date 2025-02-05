<?php

namespace Todo\Entity;

class Task
{
    public readonly int $id;
    public readonly int $user_id;
    public readonly string $name;
    public readonly string $description;
    public readonly string $created_at;
    public readonly string $due_date;
    public readonly int $priority;
    public readonly string $category;
    public readonly int $completed; 

    public function __construct(int $user_id, string $name, string $description, string $due_date, int $priority, string $category)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->description = $description;
        $this->due_date = $due_date;
        $this->priority = $priority;
        $this->category = $category;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCreated_at(string $date): void
    {
        $this->created_at = $date;
    }
}
