<?php

namespace Todo\Controller;

use Todo\Entity\Task;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class TaskController
{
    private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(TaskRepository $taskRepository, UserRepository $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;

    }
    public function homePage(): void
    {
        require_once __DIR__ . '/../../view/home.php';
    }

    public function userTaskPage(): void
    {
        $tasks = $this->taskRepository->all();
        require_once __DIR__ . '/../../view/add-task.php';
    }

    public function adminPage(): void
    {
        
        $users = $this->userRepository->all();
        $tasks = $this->taskRepository->all();
        require_once __DIR__ . "/../../view/admin.php";
    }

    public function addTask(): void
    {
        $userId = $_SESSION['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $completionDate = $_POST['completion_date'];
        $priority = $_POST['priority'];
        $category = $_POST['category'];

        $task = new Task($userId, $name, $description, $completionDate, $priority, $category);

        if($this->taskRepository->add($task)){
            header('Location: /?taskSuccess=1');
        }else{
            header('Location: /?taskSuccess=0');
        }
    }

    public function deleteTask(): void
    {
        $id = $_GET['id'];
        $this->taskRepository->delete($id);
    }
}
