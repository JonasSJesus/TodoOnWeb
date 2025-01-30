<?php

namespace Todo\Controller;

use Todo\Entity\User;
use Todo\Repository\UserRepository;

class UserController
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function DeleteUser(): void
    {
        $id = $_GET['id'];

        if($this->repository->delete($id)){
            header('Location: /admin?sucesso=1');
        } else {
            header('Location /admin?sucesso=0');
        }
    }

    public function UpdatePage(): void
    {
        $id = $_GET['id'];

        $user = $this->repository->findById($id);
        require_once __DIR__ . "/../../view/edit-user.php";
    }

    public function UpdateUser(): void
    {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $role = $_REQUEST['role'];
        $password = $_REQUEST['password'];
        $confirm_password = $_REQUEST['confirm_password'];

        if ($password !== $confirm_password) {
            $_SESSION['sweet_alert'] = 'As senhas não coincidem!';
            header("Location: /user?id=" . $id);
            exit;
        }

        $user = new User($name, $email, $role);

        
        if (!empty($password)) {
            $encrypted = password_hash($password, PASSWORD_BCRYPT);    

            $user->setPassword($encrypted);

            if($this->repository->updatePWD($id, $user)){
                $_SESSION['update'] = 'Usuário atualizado com sucesso!';
                header('Location: /admin?sucesso=1');
                exit;
            } else {
                $_SESSION['updateError'] = 'Erro ao atualizar o usuário!';
                header("Location: /user?id=" . $id);
                exit;
            }
        }

        
        if($this->repository->update($id, $user)){
            $_SESSION['update'] = 'Usuário atualizado com sucesso!';
            header('Location: /admin?sucesso=1');
            exit;
        } else {
            $_SESSION['updateError'] = 'Erro ao atualizar o usuário!';
            header("Location: /user?id=" . $id);
            exit;
        }
    }
}
