<?php

namespace Todo\Repository;

use PDOException;
use Todo\Entity\User;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all(): array|null
    {
        try {
            $stmt = $this->pdo->query(
                'SELECT * FROM users'
            );
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$users) {
                return null;
            }
            return array_map($this->hydrateUser(...), $users);
        }catch(PDOException $e){
            return null;
        }
    }

    public function findByEmail(string $email): User|null
    {
        try {
            $stmt = $this->pdo->prepare(
                'SELECT * FROM users WHERE email = ?;
            ');
            $stmt->bindValue(1, $email);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$user){
                return null;
            }

            return $this->hydrateUser($user);         
        } catch (PDOException $e) {
            return null;
        }
/*
        if (is_array($user)) {
            return $this->hydrateUser($user);
        } else {
            return null;
        }*/
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


    public function add(User $user): User|null
    {
        try {
            $stmt = $this->pdo->prepare('
            INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            $stmt->bindValue(':name', $user->name);
            $stmt->bindValue(':email', $user->email);
            $stmt->bindValue(':password', $user->password);

            $stmt->execute();

        } catch (PDOException $e) {
            return null;
        }
        
        
        $id = $this->pdo->lastInsertId();
        $user->setId($id);

        return $user;
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

    public function updatePWD(int $id, string $password): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE users SET password = :password WHERE id = :id;
        ');
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':id', $id);

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

    private function hydrateUser(array $data): User
    {
        $user = new User($data['name'], $data['email'],  $data['role']);
        $user->setId($data['id']);
        $user->setPassword($data['password']);
        $user->setCreatedAt($data['created_at']);

        return $user;
    }
}
