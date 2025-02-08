<?php

use Todo\Controller\AuthController;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;
use PDO;


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

$authController = new AuthController($taskRepository, $userRepository);


$authController->checkAccess($path);


if (array_key_exists($routesKey, $routes)){
    [$class, $method] = $routes[$routesKey];

    $controller = new $class($taskRepository, $userRepository);
    $controller->$method();
}