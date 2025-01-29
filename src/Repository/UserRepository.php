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

    public function add(User $user): bool
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->bindValue(1, $user->name);
        $stmt->bindValue(2, $user->email);
        $stmt->bindValue(3, $user->getPassword());

        return $stmt->execute();
    }


    /*
     * TODO!!!! usar transações para atualizar a senha no mesmo método --------------------------------------------------------
     */
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

    public function updatePWD(int $id, User $user): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?;
        ');
        $stmt->bindValue(1, $user->name);
        $stmt->bindValue(2, $user->email);
        $stmt->bindValue(3, $user->getPassword());
        $stmt->bindValue(4, $id);

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
