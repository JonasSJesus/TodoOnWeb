<?php

use Todo\Entity\Task;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;
use Todo\Entity\User;

$pdo = new PDO('sqlite:db.sqlite');

/*$pdo->exec("
      CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        is_admin INT CHECK(1, 0) DEFAULT 0); 

      CREATE TABLE tasks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        name TEXT NOT NULL,
        description TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
        due_date DATETIME,
        priority INTEGER CHECK(priority IN (1, 2, 3)),
        category TEXT CHECK(category IN ('Trabalho', 'Pessoal', 'Estudo', 'Lazer', 'Casa', 'Saude')),
        completed INTEGER DEFAULT 0,
        FOREIGN KEY (user_id) REFERENCES users(id));
");*/

#$pdo->exec("
#      INSERT INTO tasks (user_id, name, description, due_date) VALUES ('Admin', 'admin@admin.com', 'admin', 1);
#");

#$stmt = $pdo->query('SELECT * FROM users');
#var_dump($stmt->fetch(PDO::FETCH_ASSOC));

require_once 'vendor/autoload.php';

$user = new User('jonas', 'email', 1);
$user->setPassword('123123');

$task = new Task(1, 'Compras', 'Comprar arroz, feijao, massa, carne', '15/02/2025', 2, 'Casa');

$taskRepository = new TaskRepository($pdo);
$userRepository = new UserRepository($pdo);
var_dump($taskRepository->all());
