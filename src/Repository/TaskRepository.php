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



    public function all(int|null $id = null): array
    {
        $idUser = $id !== null ? 'WHERE user_id = :id' : '';
        $stmt = $this->pdo->query(
            "SELECT * FROM tasks $idUser;"
        );

        if ($id !== null) {
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map($this->hydrate(...),$tasks);
    }



    public function readById(int $id)
    {
        try {
            $stmt = $this->pdo->prepare(
                'SELECT * FROM tasks WHERE id = :id'
            );
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                return null;
            }

            return $this->hydrate($data);
            
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }



    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }



    public function update(Task $task): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE tasks SET name = :name, description = :description, due_date = :due_date, priority = :priority, category = :category WHERE id = :id;
        ');
        $stmt->bindValue(':name', $task->name);
        $stmt->bindValue(':description', $task->description);
        $stmt->bindValue(':due_date', $task->due_date);
        $stmt->bindValue(':priority', $task->priority);
        $stmt->bindValue(':category', $task->category);
        $stmt->bindValue(':id', $task->getId());

        return $stmt->execute();
    }



    private function hydrate(array $data): Task
    {
        $task = new Task($data['name'], $data['description'], $data['priority'], $data['category']);
        $task->setId($data['id']);
        $task->setUserId($data['user_id']);
        $task->setCreated_at($data['created_at']);
        $task->setDueDate($data['due_date']);
        return $task;
    }
}
