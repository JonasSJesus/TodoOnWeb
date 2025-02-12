<?php

namespace Todo\Entity;

class Task
{
    private int $id;


    public readonly ?int $user_id;
    public readonly string $name;
    public readonly string $description;
    public readonly string $created_at;
    public readonly string $due_date;
    public readonly int $priority;
    public readonly string $category;
    public readonly int $completed; 

    public function __construct(string $name, string $description, int $priority, string $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->priority = $priority;
        $this->category = $category;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }


    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function setCreated_at(string $date): void
    {
        $this->created_at = $date;
    }

    public function setDueDate(string $due_date): void
    {
        $this->due_date = $due_date;
    }

    public function getDueDate(): string
    {
        return $this->due_date;
    }

}
