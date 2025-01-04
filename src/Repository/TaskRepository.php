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
            'INSERT INTO tasks (titulo, descricao, status) VALUES (?, ?, ?);'
        );
        $stmt->bindValue(1, $task->title);
        $stmt->bindValue(2, $task->description);
        $stmt->bindValue(3, $task->status);

        return $stmt->execute();
    }

    public function all(): array
    {
        $stmt = $this->pdo->query(
            'SELECT * FROM tasks;'
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}