<?php

namespace Todo\Controller;

use Todo\Entity\User;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class AuthController 
{
    private UserRepository $userRepository;

    public function __construct(array $repository)
    {
        $this->userRepository = $repository['user'];
        
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => 0,          // Expira ao fechar o navegador
                'path' => '/',            // Válido em todo o site
                'domain' => '',           // Mesmo domínio
                'httponly' => true,       // Impede acesso via JavaScript
                'samesite' => 'Strict'    // Previne ataques CSRF
            ]);

            session_start();
            session_regenerate_id();
        }

    }

    // Adiciona Usuários 
    public function addUser(): void
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
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

        $savedUser = $this->userRepository->add($user);

        if (!empty($savedUser)){
            $this->createSession($savedUser);
            $_SESSION['register'] = 'Usuário Criado com Sucesso!';
            header('Location: /');
            exit;
        }else{
            $_SESSION['register'] = 'Erro ao cadastrar Usuário';
            header("Location: /cadastro");
            exit;
        }
    }

    // Validação de credenciais
    public function login(): void
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        if (!$email or !$password){
            $_SESSION['login'] = 'Campos vazios não são permitidos!';
            header("Location: /login");
            exit;
        }

        $user = $this->userRepository->findByEmail($email);

        if (!$user or !password_verify($password, $user->password)){
            $_SESSION['login'] = 'Usuario ou senha incorretos!';
            header("Location: /login");
            exit;
        }

        $this->createSession($user);
        header ('Location: /');
    }

    //  Criação de sessão
    private function createSession(User $user): void
    {
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $user->getId();
        $_SESSION['email'] = $user->email;
        $_SESSION['nome'] = $user->name;
        $_SESSION['role'] = $user->role;
        session_regenerate_id(true);
    }

    // Destrói a Sessão atual
    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
        exit;
    }

    // Pede autenticação
    public function checkAccess($path): void
    {
        $public_routes = ['/login', '/cadastro', '/home'];
        $admin_router = ['/admin'];


        if(!in_array($path, $public_routes) && !$this->isLogged()){
            header('Location: /home');
            exit;
        }

        if(in_array($path, $admin_router) && !$this->isAdmin()){
            header('Location: /');
            http_response_code(401);
            exit;
        }
    }

    // Verifica se está em uma sessão
    private function isLogged(): bool
    {
        return isset($_SESSION['logado']);
    }

    public function isAdmin(): bool
    {
        return isset($_SESSION['role']) and $_SESSION['role'] === 'admin';
    }
}

