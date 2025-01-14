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
        #session_start();
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
            exit;
        }
        $user = new User($name, $email, $encrypted);
        if ($this->repository->add($user)){
            $this->createSession($user);
        }else{
            header('Location: /?sucesso=0');
        }
    }

    public function login()
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $user = $this->repository->findByEmail($email); 

        if (!$user or !password_verify($password, $user->password)){
            echo "<script>alert('Usuario ou senha incoretos!')</script>";
            exit;
        }

        $this->createSession($user);
        header ('Location: /');
    }

    private function createSession($user)
    {
        $_SESSION['logado'] = true;
        $_SESSION['email'] = $user->email;
        $_SESSION['nome'] = $user->name;
        #$_SESSION['id'] = $user->id;
        session_regenerate_id(true);
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function requireAuth($path)
    {
        
        if(!$this->isLogged() and $path !== '/login' and $path !== '/cadastro'){
            header('Location: /login');
            exit;
        }
        
    }

    public function isLogged(): bool
    {
        return array_key_exists('logado', $_SESSION);
    }
}

