<?php

namespace Todo\Controller;

use Todo\Entity\User;
use Todo\Helper\FlashMessagesTrait;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;
use Todo\Service\AuthService;

class AuthController 
{
    use FlashMessagesTrait;

    #private UserRepository $userRepository;
    private AuthService $authService;

    public function __construct(array $dependencies)
    {
        #$this->userRepository = $dependencies['userRepository'];
        $this->authService = $dependencies['authService'];

    }

    // Adiciona Usuários 
    public function addUser(): void
    {
        $request = [
            'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS),
            'email' => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
            'password' => filter_input(INPUT_POST, 'password'),
            'confirm_password' => $_POST['confirm_password']
        ];

        if (!$request['email'] or !$request['password'] or !$request['name']){
            $_SESSION['register'] = 'Campos vazios não são permitidos!';
            header("Location: /cadastro");
            exit;
        }

        if ($request['password'] !== $request['confirm_password']){
            $_SESSION['register'] = 'As senhas não coincidem!';
            header("Location: /cadastro");
            exit;
        }

        $savedUser = $this->authService->saveUser($request);

        if (!empty($savedUser)){
            $this->createSession($savedUser);
            $_SESSION['register'] = 'Usuário Criado com Sucesso!';
            header('Location: /');
            exit;
        }else{
            $this->errorMessages('Erro ao cadastrar Usuário');
            header("Location: /cadastro");
            exit;
        }
    }

    // Validação de credenciais
    public function login(): void
    {
        $request = [
            'email' => filter_input(INPUT_POST, 'email'),
            'password' => filter_input(INPUT_POST, 'password')
        ];

        if (!$request['email'] or !$request['password']){
            $_SESSION['login'] = 'Campos vazios não são permitidos!';
            header("Location: /login");
            exit;
        }


        $userAuthenticated = $this->authService->authenticate($request);


        if ($userAuthenticated === null){
            $this->errorMessages('E-Mail ou Senha incorretos!');
            header("Location: /login");
            exit;
        }


        $this->createSession($userAuthenticated);
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
    }

    // Destrói a Sessão atual
    public function logout(): void
    {
        unset($_SESSION['logado']);
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['nome']);
        unset($_SESSION['role']);

        header('Location: /home');
    }
}
