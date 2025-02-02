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
            'INSERT INTO tasks (titulo, user_id, name, description, due_date, priority, category, completed, status) VALUES (?, ?, ?);'
        );
        $stmt->bindValue(1, $task->title);
        $stmt->bindValue(2, $task->description);
        $stmt->bindValue(3, $task->status);

        return $stmt->execute();
    }

    public function hydrate(array $data): Task
    {

    }

    public function all(): array
    {
        $stmt = $this->pdo->query(
            'SELECT * FROM tasks;'
        );

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->hydrate($data);
    }


}
