<?php

namespace Todo\Controller;

use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class AdminController
{
    #private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        #$this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    public function request(): void
    {
        $users = $this->userRepository->all();
        require_once __DIR__ . "/../../view/admin.php";
    }
}
