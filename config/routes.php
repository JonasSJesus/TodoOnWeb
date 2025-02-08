<?php

use Todo\Controller\AuthController;
use Todo\Controller\TaskController;
use Todo\Controller\UserController;

return [
    'GET|/' => [TaskController::class, 'dashboardPage'],
    'GET|/admin' => [TaskController::class, 'adminPage'],
    'GET|/tarefas' => [TaskController::class, 'userTaskPage'],
    'GET|/delete-task' => [TaskController::class, 'deleteTask'],
    'GET|/cadastro' => [UserController::class, 'userCadForm'],
    'GET|/login' => [UserController::class, 'userLoginForm'],
    'GET|/logout' => [AuthController::class, 'logout'],
    'GET|/delete-user' => [UserController::class, 'DeleteUser'],
    'GET|/profile' => [UserController::class, 'updatePage'],

    'POST|/tarefas' => [TaskController::class, 'addTask'],
    'POST|/cadastro' => [AuthController::class, 'addUser'],
    'POST|/login' => [AuthController::class, 'login'],
    'POST|/profile' => [UserController::class, 'updateUser']
];
