<?php

namespace Todo\Repository;

use Todo\Entity\User;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function hydrateUser(array $data): User
    { 
        $user = new User($data['name'], $data['email'], $data['password'], $data['is_admin']);
        $user->setId($data['id']);

        return $user;
    }

    public function all()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map($this->hydrateUser(...), $users);
    }

    public function findByEmail($email): User
    {
        $stmt = $this->pdo->prepare('
            SELECt * FROM users WHERE email = ?;
        ');
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $this->hydrateUser($user);
    }

    public function add(User $user): bool
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->bindValue(1, $user->name);
        $stmt->bindValue(2, $user->email);
        $stmt->bindValue(3, $user->password);

        return $stmt->execute();
    }

    public function update(int $id, User $user): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE users SET name = ?, email = ? WHERE id = ?;
        ');
        $stmt->bindValue(1, $user->name);
        $stmt->bindVAlue(2, $user->email);
        $stmt->bindValue(3, $id);

        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM users WHERE id = ?;
        ");
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    } 
}
