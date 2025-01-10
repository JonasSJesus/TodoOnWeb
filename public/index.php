<?php

use Todo\Controller\AdminController;
use Todo\Controller\AuthController;
use Todo\Controller\TaskController;
use Todo\Controller\UserController;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
$dbPath = __DIR__ . '/../db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$path = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];

$userRepository = new UserRepository($pdo);
$taskRepository = new TaskRepository($pdo);

$adminController = new AdminController($userRepository);
$taskController = new TaskController($taskRepository);
$userController = new UserController($userRepository);
$authController = new AuthController($userRepository);

$authController->requireAuth($path);

switch ($path) {
    case '/': 
        $taskController->requestHome();
        break;
    case '/admin':
        $adminController->request();
        break;
    case '/user':
        $taskController->userPage();
        break;
    case '/minha-conta':
        echo 'nice';
        break;
    case '/cadastro':
        if ($method == 'GET'){
            $authController->userCadForm();
        } elseif ($method == 'POST'){
            $authController->addUser();
        }
        break;
    case '/login':
        if ($method == 'GET'){
            $authController->userLoginForm();
        } elseif ($method == 'POST'){
            $authController->login();
        }
        break;
    case '/logout':
        $authController->logout();
        break;
    default:
        echo "<script>alert('página não encontrada!')</script>";
        break;
}
