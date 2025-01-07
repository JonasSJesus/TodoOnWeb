<?php

use Todo\Repository\UserRepository;

$pdo = new PDO('sqlite:db.sqlite');
/*$pdo->exec("
      CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        is_admin BOOLEAN DEFAULT 0); 

      CREATE TABLE tasks (
        id INTEGER NOT NULL,
        user_id INTEGER NOT NULL,
        name TEXT NOT NULL,
        description TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        due_date DATETIME,
        priority INTEGER CHECK(priority IN (1, 2, 3)),
        category TEXT CHECK(category IN ('Trabalho', 'Pessoal', 'Estudo', 'Casa', 'Projeto')),
        completed INTEGER DEFAULT 0,
        FOREIGN KEY (user_id) REFERENCES users(id));
");*/

/*$pdo->exec("
      INSERT INTO users (name, email, password, is_admin) VALUES ('Admin', 'admin@admin.com', 'admin', 1);
");*/

#$stmt = $pdo->query('SELECT * FROM users');
#var_dump($stmt->fetch(PDO::FETCH_ASSOC));

require_once 'vendor/autoload.php';

$userRepository = new UserRepository($pdo);
var_dump($userRepository->all());
