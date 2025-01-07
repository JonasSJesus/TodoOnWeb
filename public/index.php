<?php

use Todo\Controller\AdminController;
use Todo\Controller\TaskController;
use Todo\Controller\UserController;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

require_once __DIR__ . '/../vendor/autoload.php';
$dbPath = __DIR__ . '/../db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$path = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];

$userRepository = new UserRepository($pdo);
$taskRepository = new TaskRepository($pdo);

$adminController = new AdminController($userRepository);
$taskController = new TaskController();
#$userController = new UserController($userRepository);

switch ($path) {
    case '/':
        $taskController->requestHome();
        break;
    case '/admin':
        $adminController->request();
        break;
    case '/user':
        $userController->userPage();
        break;
    case '/minha-conta':
        echo 'nice';
        break;
    case '/registrar':
        require_once __DIR__ . '/../view/register.php';
        break;
    case '/login':
        require_once __DIR__ . '/../view/login.php';
        break;
    default:
        echo "<script>alert('página não encontrada!')</script>";
        break;
}
