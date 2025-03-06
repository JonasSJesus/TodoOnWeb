<?php
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

use Todo\Controller\AuthController;
use Todo\Controller\TaskController;
use Todo\Controller\UserController;

return [
    'GET|/' => [TaskController::class, 'dashboardPage'], 
    'GET|/home' => [TaskController::class, 'homePage'],
    'GET|/admin' => [TaskController::class, 'adminPage'],
    'GET|/tarefas' => [TaskController::class, 'userTaskPage'],
    'GET|/edit-task' => [TaskController::class, 'taskForm'],
    'GET|/delete-task' => [TaskController::class, 'deleteTask'],
    'GET|/cadastro' => [UserController::class, 'userCadForm'],
    'GET|/login' => [UserController::class, 'userLoginForm'],
    'GET|/profile' => [UserController::class, 'updatePage'],
    'GET|/edit-pwd' => [UserController::class, 'updatePWDForm'],
    'GET|/delete-user' => [UserController::class, 'deleteUser'],
    'GET|/logout' => [AuthController::class, 'logout'],

    'POST|/tarefas' => [TaskController::class, 'addTask'],
    'POST|/edit-task' => [TaskController::class, 'updateTask'],
    'POST|/cadastro' => [AuthController::class, 'addUser'],
    'POST|/login' => [AuthController::class, 'login'],
    'POST|/profile' => [UserController::class, 'updateUser'],
    'POST|/edit-pwd' => [AuthController::class, 'updatePWD']
];
