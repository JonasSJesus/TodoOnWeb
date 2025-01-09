<?php

namespace Todo\Controller;

use Todo\Entity\User;
use Todo\Repository\UserRepository;

class AuthController 
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
            die();
        }
        $user = new User($name, $email, $encrypted);
        if ($this->repository->add($user)){
            $this->createSession();
        }else{
            header('Location: /?sucesso=0');
        }
    }

    public function createSession()
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $userRegistrated = $this->repository->findByEmail($email);
        $userPassword = $userRegistrated->password;

        if (password_verify($password, $userPassword)){
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['email'] = $userRegistrated->email;
            $_SESSION['nome'] = $userRegistrated->name;
            $_SESSION['id'] = $userRegistrated->id;

            header('Location: /');

        }else {
            echo 'senha errada patrao';
        }
    }



    public function loginUser()
    {
        
    }
}

