<?php

use Todo\Controller\AuthController;
use Todo\Controller\TaskController;
use Todo\Controller\UserController;

return [
    'GET|/' => [TaskController::class, 'dashboardPage'],
    'GET|/admin' => [TaskController::class, 'adminPage'],
    'GET|/tarefas' => [TaskController::class, 'userTaskPage'],
    'GET|/edit-task' => [TaskController::class, 'taskForm'],
    'GET|/delete-task' => [TaskController::class, 'deleteTask'],
    'GET|/cadastro' => [UserController::class, 'userCadForm'],
    'GET|/login' => [UserController::class, 'userLoginForm'],
    'GET|/profile' => [UserController::class, 'updatePage'],
    'GET|/logout' => [AuthController::class, 'logout'],
    'GET|/delete-user' => [UserController::class, 'DeleteUser'],

    'POST|/tarefas' => [TaskController::class, 'addTask'],
    'POST|/edit-task' => [TaskController::class, 'updateTask'],
    'POST|/cadastro' => [AuthController::class, 'addUser'],
    'POST|/login' => [AuthController::class, 'login'],
    'POST|/profile' => [UserController::class, 'updateUser']
];
