<?php

namespace Todo\Repository;
use PDO;
use Todo\Entity\Task;

class TaskRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Task $task): bool
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, name, description, due_date, priority, category) VALUES (:user_id, :name, :description, :due_date, :priority, :category);'
        );
        $stmt->bindValue(':user_id', $task->user_id);
        $stmt->bindValue(':name', $task->name);
        $stmt->bindValue(':description', $task->description);
        $stmt->bindValue(':due_date', $task->due_date);
        $stmt->bindValue(':priority', $task->priority);
        $stmt->bindValue(':category', $task->category);

        return $stmt->execute();
    }

    public function hydrate(array $data): Task
    {
        $task = new Task($data['user_id'], $data['name'], $data['description'], $data['due_date'], $data['priority'], $data['category']);
        
        $task->setId($data['id']);
        $task->setCreated_at($data['created_at']);

        return $task;
    }

    public function all(): array
    {
        $stmt = $this->pdo->query(
            'SELECT * FROM tasks;'
        );

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map($this->hydrate(...),$tasks);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
