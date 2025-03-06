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
            return;
        }

        if ($request['password'] !== $request['confirm_password']){
            $_SESSION['register'] = 'As senhas não coincidem!';
            header("Location: /cadastro");
            return;
        }

        $savedUser = $this->authService->saveUser($request);

        if (!empty($savedUser)){
            $this->authService->createSession($savedUser);
            $_SESSION['register'] = 'Usuário Criado com Sucesso!';
            header('Location: /');
            return;
        }else{
            $this->errorMessages('Erro ao cadastrar Usuário');
            header("Location: /cadastro");
            return;
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
            return;
        }

        try {
            $userAuthenticated = $this->authService->authenticate($request['email'], $request['password']);
            $this->authService->createSession($userAuthenticated);
            header ('Location: /');
        } catch (\Exception $e) {
            $this->errorMessages($e->getMessage())
            ->withHeader("Location: /login");
            
        }

    }


    public function updatePWD(): void
    {
        $request = [
            'id' => $_SESSION['id'],                // ! Talvez seja reduntante passar o ID dessa forma.
            'email' => $_SESSION['email'],          // ! E aqui também.
            'current_password' => filter_input(INPUT_POST, 'current_password'),
            'password' => filter_input(INPUT_POST, 'password'),
            'confirm_password' =>  filter_input(INPUT_POST, 'confirm_password')
        ];

        if (!$request['password'] || !$request['current_password'] || !$request['confirm_password']) {
            $this
                ->errorMessages('Todos os campos devem ser preenchidos!')
                ->withHeader('Location: /edit-pwd')
            ;
            return;
        }

        if ($request['password'] !== $request['confirm_password']) {
            $this
                ->errorMessages('As senhas não coincidem')
                ->withHeader("Location: /edit-pwd")
            ;
            return;
        }

        try {
            $this->authService->updatePWD($request);
            $this->errorMessages('Senha alterada com sucesso')
                ->withHeader("Location: /edit-pwd");

        } catch (\Exception $e) {
            $this
                ->errorMessages($e->getMessage())
                ->withHeader("Location: /edit-pwd");
        }
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
