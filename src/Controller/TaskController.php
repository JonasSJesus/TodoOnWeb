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
    public function requestHome(): void
    {
        require_once __DIR__ . '/../../view/home.php';
    }

    public function addTaskRequest()
    {
        echo "adicionando task";
    }

    public function userPage()
    {
        $this->taskRepository->all();
        require_once __DIR__ . '/../../view/user.php';
    }

    public function adminPage(): void
    {
        $users = $this->userRepository->all();
        require_once __DIR__ . "/../../view/admin.php";
    }
}
