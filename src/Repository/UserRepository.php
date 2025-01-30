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
        $user = new User($data['name'], $data['email'],  $data['is_admin']);
        $user->setId($data['id']);
        $user->setPassword($data['password']);

        return $user;
    }

    public function all()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map($this->hydrateUser(...), $users);
    }

    public function findByEmail($email): User|null
    {
        $stmt = $this->pdo->prepare('
            SELECT * FROM users WHERE email = ?;
        ');
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (is_array($user)) {
            return $this->hydrateUser($user);
        } else {
            return null;
        }
    }

    public function findById(int $id): User|null
    {
        $stmt = $this->pdo->prepare('
        SELECT * FROM users WHERE id = ?;
        ');
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $this->hydrateUser($user);
        } else {
            return null;
        }
    }

    public function findLastId(): int
    {
        return $this->pdo->lastInsertId();
    }

    public function add(User $user): User
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->bindValue(1, $user->name);
        $stmt->bindValue(2, $user->email);
        $stmt->bindValue(3, $user->password);

        $stmt->execute();

        $id = $this->pdo->lastInsertId();
        $user->setId($id);

        return $user;
    }


    /*
     * TODO!!!! usar transações para atualizar a senha no mesmo método --------------------------------------------------------
     */
    public function update(int $id, User $user): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE users SET name = ?, email = ?, is_admin = ? WHERE id = ?;
        ');
        $stmt->bindValue(1, $user->name);
        $stmt->bindVAlue(2, $user->email);
        $stmt->bindVAlue(3, $user->is_admin);
        $stmt->bindValue(4, $id);

        return $stmt->execute();
    }

    public function updatePWD(int $id, User $user): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE users SET name = ?, email = ?, is_admin = ?, password = ? WHERE id = ?;
        ');
        $stmt->bindValue(1, $user->name);
        $stmt->bindValue(2, $user->email);
        $stmt->bindValue(3, $user->is_admin);
        $stmt->bindValue(4, $user->password);
        $stmt->bindValue(5, $id);

        return $stmt->execute();
    }
    /*
     * TODO: REFATORAR O MÉTODO updatePWD()!!! -------------------------------------------------------------------------------
     */

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM users WHERE id = ?;
        ");
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    } 
}
