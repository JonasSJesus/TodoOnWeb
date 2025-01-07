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
        $user = new User($data['name'], $data['email'], $data['is_admin']);
        $user->setId($data['id']);

        return $user;
    }

    public function all()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map($this->hydrateUser(...), $users);
    }

    /*public function add(User $user): bool
    {
        $this->pdo->prepare('');
    }*/
}
