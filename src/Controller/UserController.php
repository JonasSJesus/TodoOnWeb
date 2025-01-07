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

    public function userCadForm(): void
    {
        require_once __DIR__ . '/../../view/register.php';
    }

    public function userLoginForm(): void
    {
        require_once __DIR__ . '/../../view/login.php';
    }

    public function addUser(): void
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $encrypted = password_hash($password, PASSWORD_BCRYPT);
        $confirm_password = $_REQUEST['confirm_password'];

        if ($password !== $confirm_password){
            echo "<script>alert('as senhas não coincidem!')</script>";
        }
        $user = new User($name, $email, $encrypted);
        if ($this->repository->add($user)){
            header('Location: /?sucesso=1');
        }else{
            header('Location: /?sucesso=0');
        }
    }





    public function loginUser()
    {
        
    }
}
