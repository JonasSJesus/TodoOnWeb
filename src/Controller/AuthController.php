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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encrypted = password_hash($password, PASSWORD_BCRYPT);
        $confirm_password = $_POST['confirm_password'];

        if (!$email or !$password or !$name){
            $_SESSION['register'] = 'Campos vazios não são permitidos!';
            header("Location: /cadastro");
            exit;
        }

        if ($password !== $confirm_password){
            $_SESSION['register'] = 'As senhas não coincidem!';
            header("Location: /cadastro");
            exit;
        }

        $user = new User($name, $email);
        $user->setPassword($encrypted);

        if ($this->repository->add($user)){
            $this->createSession();
            header('Location: /cadastro');
            exit;
        }else{
            $_SESSION['register'] = 'Erro ao cadastrar Usuário';
            header("Location: /cadastro");
            exit;
        }
    }

    public function login()
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        if (!$email or !$password){
            $_SESSION['login'] = 'Campos vazios não são permitidos!';
            header("Location: /login");
            exit;
        }

        $user = $this->repository->findByEmail($email);

        if (!$user or !password_verify($password, $user->password)){
            $_SESSION['login'] = 'Usuario ou senha incorretos!';
            header("Location: /login");
            exit;
        }

        $this->createSession($user);
        header ('Location: /');
    }

    private function createSession($user)
    {
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['nome'] = $user->name;
        $_SESSION['is_admin'] = $user->is_admin;
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

    private function isLogged(): bool
    {
        return array_key_exists('logado', $_SESSION);
    }
}

