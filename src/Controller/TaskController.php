<?php

namespace Todo\Controller;

use Todo\Controller\Controller;
use Todo\Entity\Task;
use Todo\Repository\TaskRepository;

class TaskController
{
    #public function __construct(private TaskRepository $taskRepository)
    #{
        
    #}
    public function requestHome(): void
    {
        require_once __DIR__ . '/../../view/home.php';
    }

    public static function addTaskRequest()
    {
        echo "adicionando task";
    }
}
