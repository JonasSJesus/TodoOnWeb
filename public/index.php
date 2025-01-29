<?php

use Todo\Controller\AuthController;
use Todo\Controller\TaskController;
use Todo\Controller\UserController;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

session_start();

require_once 'errors.php';

require_once __DIR__ . '/../vendor/autoload.php';
$dbPath = __DIR__ . '/../db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$path = $_SERVER['PATH_INFO'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];

$userRepository = new UserRepository($pdo);
$taskRepository = new TaskRepository($pdo);

$taskController = new TaskController($taskRepository, $userRepository);
$userController = new UserController($userRepository);
$authController = new AuthController($userRepository);

$authController->requireAuth($path);

switch ($path) {
    case '/': 
        $taskController->requestHome();
        break;
    case '/admin':
        $taskController->adminPage();
        break;
    case '/tasks':
        $taskController->userTaskPage();
        break;
    case '/user':
        $userController->UpdatePage();
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
    case '/excluir-user':
        $userController->DeleteUser();
        break;
    case '/editar-user':
        if ($method == 'GET'){
            $userController->UpdatePage();
        } elseif ($method == 'POST'){
            $userController->UpdateUser();
        }
        break;
    default:
        require_once "logout.php";
        #echo "página não encontrada!";
        #header('Location: /');
        break;
}
