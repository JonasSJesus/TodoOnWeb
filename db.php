<?php

use Todo\Entity\Task;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;
use Todo\Entity\User;

$pdo = new PDO('sqlite:database.sqlite');

/*
$pdo->exec("
    CREATE TABLE users (
        id INTEGER PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP NOT NULL,
        role TEXT CHECK(role IN ('admin', 'user')) DEFAULT 'user'
    );
");

$pdo->exec("
    CREATE TABLE tasks (
        id INTEGER PRIMARY KEY,
        user_id INTEGER NOT NULL,
        name TEXT NOT NULL,
        description TEXT NOT NULL,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP NOT NULL,
        due_date DATE,
        priority INTEGER CHECK(priority BETWEEN 1 AND 3),
        category TEXT CHECK(category IN ('Trabalho', 'Pessoal', 'Estudo', 'Lazer', 'Casa', 'Saude')),
        completed INTEGER DEFAULT 0,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
");
*/

$password = password_hash('admin', PASSWORD_ARGON2ID);


$pdo->exec("
      INSERT INTO users (name, email, password, role) VALUES ('Admin', 'admin', '$password', 'admin');
");


//$stmt = $pdo->query('SELECT * FROM users');
//var_dump($stmt->fetch(PDO::FETCH_ASSOC));
//require_once 'vendor/autoload.php';
//$user = new User('jonas', 'email', 1);
//$user->setPassword('123123');
//$task = new Task(1, 'Compras', 'Comprar arroz, feijao, massa, carne', '15/02/2025', 2, 'Casa');
//$taskRepository = new TaskRepository($pdo);
//$userRepository = new UserRepository($pdo);
//var_dump($taskRepository->all());
