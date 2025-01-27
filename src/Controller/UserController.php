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
        $encrypted = password_hash($password, PASSWORD_BCRYPT);
        $confirm_password = $_REQUEST['confirm_password'];

        if ($password !== $confirm_password){
            echo "<script>alert('as senhas não coincidem!')</script>";
            exit;
        }

        $user = new User($name, $email, $encrypted, $role);
        var_dump ($user);
        exit;
        
        if($this->repository->update($id, $user)){
            header('Location: /admin?sucesso=1');
        } else {
            header('Location: /admin?sucesso=0');
        }
    }
}
