<?php

use Todo\Controller\AuthController;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;


require_once 'errors.php';
require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$routes = require_once __DIR__ . '/../config/routes.php';
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';
$routesKey = "$method|$path";

$userRepository = new UserRepository($pdo);
$taskRepository = new TaskRepository($pdo);
$dependencies = [
    'task' => $taskRepository, 
    'user' => $userRepository
];


$authController = new AuthController($dependencies);


$authController->checkAccess($path);


if (array_key_exists($routesKey, $routes)){
    [$class, $method] = $routes[$routesKey];

    $controller = new $class($dependencies);
    $controller->$method();
} else {
    http_response_code(404);
}