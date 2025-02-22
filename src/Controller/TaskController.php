<?php

namespace Todo\Controller;

use Todo\Entity\Task;
use Todo\Helper\FlashMessagesTrait;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class TaskController
{
    use FlashMessagesTrait;

    private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(array $repository)
    {
        $this->taskRepository = $repository['taskRepository'];
        $this->userRepository = $repository['userRepository'];

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
        $request = [
            'user_id' => $_SESSION['id'],
            'taskName' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS),
            'description' => filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS),
            'dueDate' => filter_input(INPUT_POST, 'due_date'),
            'priority' => filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT),
            'category' => filter_input(INPUT_POST, 'category')
        ];

        var_dump($request);
        exit();

        $task = new Task($request['taskName'], $request['description'], $request['priority'], $request['category']);
        $task->setDueDate($request['dueDate']);
        $task->setUserId($request['user_id']);


        if($this->taskRepository->add($task)){
            header('Location: /?taskSuccess=1');
        }else{
            $this->errorMessages('Erro ao cadastrar Tarefa');
            header('Location: /');
        }
    }



    public function updateTask(): void
    {
        $request = [
            'id' => filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT),
            'taskName' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS),
            'description' => filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS),
            'dueDate' => filter_input(INPUT_POST, 'due_date'),
            'priority' => filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT),
            'category' => filter_input(INPUT_POST, 'category')
        ];


        $task = new Task($request['taskName'], $request['description'], $request['priority'], $request['category']);
        $task->setDueDate($request['dueDate']);
        $task->setId($request['id']);

        if ($this->taskRepository->update($task)){
            header('Location: /?sucesso=1');
        } else {
            $this->errorMessages('Erro ao atualizar Tarefa');
            header('Location: /');
        }
    }



    public function deleteTask(): void
    {
        $id = $_GET['id'];
        $this->taskRepository->delete($id);
        header('Location: /');
    }
}
