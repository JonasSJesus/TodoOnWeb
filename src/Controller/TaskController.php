<?php

namespace Todo\Controller;

use Todo\Controller\Controller;
use Todo\Entity\Task;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class TaskController
{
    public function __construct(private TaskRepository $taskRepository, private UserRepository $userRepository)
    {
        
    }
    public function homePage(): void
    {
        require_once __DIR__ . '/../../view/home.php';
    }

    public function userTaskPage()
    {
        $tasks = $this->taskRepository->all();
        require_once __DIR__ . '/../../view/task.php';
    }

    public function adminPage(): void
    {
        
        $users = $this->userRepository->all();
        $tasks = $this->taskRepository->all();
        require_once __DIR__ . "/../../view/admin.php";
    }

    public function addTask(): void
    {
        
    }
}
