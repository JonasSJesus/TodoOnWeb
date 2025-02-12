<?php

namespace Todo\Controller;

use Todo\Entity\User;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class UserController
{
    private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(TaskRepository $taskRepository, UserRepository $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;

    }

    // Renderizar formulários de cadastro e Login
    public function userCadForm(): void
    {
        require_once __DIR__ . '/../../view/register.php';
    }

    public function userLoginForm(): void
    {
        require_once __DIR__ . '/../../view/login.php';
    }
    public function updatePage(): void
    {
        $id = $_GET['id'];

        $user = $this->userRepository->findById($id);
        require_once __DIR__ . "/../../view/profile.php";
    }

    public function updatePWDForm(): void
    {
        require_once __DIR__ . "/../../view/edit-userpwd.php";
    }

    public function DeleteUser(): void
    {
        $id = $_GET['id'];

        if($this->userRepository->delete($id)){
            header('Location: /admin?sucesso=1');
        } else {
            header('Location /admin?sucesso=0');
        }
    }

    /*
     * Atualiza somente a senha
     */

    public function updatePWD(): void
    {
        $currentPassword = filter_input(INPUT_POST, 'current_password');
        $password = filter_input(INPUT_POST, 'password');
        $confirm_password =  filter_input(INPUT_POST, 'confirm_password');

        if ($password !== $confirm_password) {
            $_SESSION['sweet_alert'] = 'As senhas não coincidem!';
            header("Location: /profile?id=" . $id);
            exit;
        }

        if (!empty($password)) {
            $encrypted = password_hash($password, PASSWORD_BCRYPT);

            $user->setPassword($encrypted);

            if($this->userRepository->updatePWD($id, $user)){
                $_SESSION['update'] = 'Usuário atualizado com sucesso!';
                header('Location: /admin?sucesso=1');
                exit;
            } else {
                $_SESSION['updateError'] = 'Erro ao atualizar o usuário!';
                header("Location: /profile?id=" . $id);
                exit;
            }
        }
    }

    /*
     * Controlador de edicao de usuarios
     */
    public function updateUser(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $user = new User($name, $email);

        if($this->userRepository->update($id, $user)){
            $_SESSION['update'] = 'Usuário atualizado com sucesso!';
            header('Location: /profile?id=' . $id);
            exit;
        } else {
            $_SESSION['updateError'] = 'Erro ao atualizar o usuário!';
            header("Location: /profile?id=" . $id);
            exit;
        }
    }

}
