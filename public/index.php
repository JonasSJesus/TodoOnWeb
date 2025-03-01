<?php

use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;
use Todo\Service\AuthService;


require_once 'errors.php';
require_once __DIR__ . '/../vendor/autoload.php';

$pdo = require_once __DIR__ . '/../config/dbConfig.php';
$routes = require_once __DIR__ . '/../config/routes.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';
$routesKey = "$method|$path";

$userRepository = new UserRepository($pdo);
$taskRepository = new TaskRepository($pdo);
$authService = new AuthService($userRepository);

$dependencies = [
    'taskRepository' => $taskRepository,
    'userRepository' => $userRepository,
    'authService' => $authService
];


$authService->checkAccess($path);


if (array_key_exists($routesKey, $routes)){
    [$class, $method] = $routes[$routesKey];

    $controller = new $class($dependencies);
    $controller->$method();
} else {
    http_response_code(404);
}