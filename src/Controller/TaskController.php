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
    public function dashboardPage(): void
    {
        $tasks = $this->taskRepository->all();
        require_once __DIR__ . '/../../view/dashboard.php';
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
        $dueDate = $_POST['due_date'];
        $priority = $_POST['priority'];
        $category = $_POST['category'];

        $task = new Task($userId, $name, $description, $dueDate, $priority, $category);

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
        header('Location: /');
    }
}
