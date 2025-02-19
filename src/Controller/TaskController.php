<?php

namespace Todo\Controller;

use Todo\Entity\Task;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class TaskController
{
    private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(array $repository)
    {
        $this->taskRepository = $repository['task'];
        $this->userRepository = $repository['user'];

    }

    /*
     * Renderizacao de templates:
     *
     * */
    public function homePage(): void
    {
        require_once __DIR__ . '/../../view/home.php';
    }

    public function dashboardPage(): void
    {
        $id = $_SESSION['id'];
        $tasks = $this->taskRepository->all($id);
        require_once __DIR__ . '/../../view/dashboard.php';
    }

    public function userTaskPage(): void
    {
        require_once __DIR__ . '/../../view/add-task.php';
    }

    public function taskForm()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
        $task = $this->taskRepository->readById($id) ?? '';

        if (!$task){
            header('Location: /');
        }

        if (($task->user_id != $_SESSION['id'])){
            header('Location: /');
        }

        require_once __DIR__ . "/../../view/edit-task.php";
    }

    public function adminPage(): void
    {
        
        $users = $this->userRepository->all();
        $tasks = $this->taskRepository->all();
        require_once __DIR__ . "/../../view/admin.php";
    }



    /*
     * Controller CRUD:
     */

    public function addTask(): void
    {
        $userId = $_SESSION['id'];
        $taskName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $dueDate = filter_input(INPUT_POST, 'due_date');
        $priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
        $category = filter_input(INPUT_POST, 'category');


        $task = new Task($taskName, $description, $priority, $category);
        $task->setDueDate($dueDate);
        $task->setUserId($userId);

        if($this->taskRepository->add($task)){
            header('Location: /?taskSuccess=1');
        }else{
            header('Location: /?taskSuccess=0');
        }
    }



    public function updateTask(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $taskName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $dueDate = filter_input(INPUT_POST, 'due_date');
        $priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
        $category = filter_input(INPUT_POST, 'category');


        $task = new Task($taskName, $description, $priority, $category);
        $task->setDueDate($dueDate);
        $task->setId($id);

        if ($this->taskRepository->update($task)){
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }
    }



    public function deleteTask(): void
    {
        $id = $_GET['id'];
        $this->taskRepository->delete($id);
        header('Location: /');
    }
}
