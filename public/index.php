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



switch ($path) {
    case '/':
        if(!$_SESSION['logado']){
            header('Location: /login');
            exit();
        }
        $taskController->requestHome();
        break;
    case '/admin':
        if(!$_SESSION['logado']){
            header('Location: /login');
            exit();
        }
        $adminController->request();
        break;
    case '/user':
        if(!$_SESSION['logado']){
            header('Location: /login');
            exit();
        }
        $taskController->userPage();
        break;
    case '/minha-conta':
        if(!$_SESSION['logado']){
            header('Location: /login');
            exit();
        }
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
            $authController->createSession();
        }
        break;
    default:
        echo "<script>alert('página não encontrada!')</script>";
        break;
}
