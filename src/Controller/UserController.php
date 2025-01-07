<?php

namespace Todo\Controller;

use Todo\Repository\TaskRepository;


class UserController
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function userPage(): void
    {
        $this->repository->all();
        
    }
}
