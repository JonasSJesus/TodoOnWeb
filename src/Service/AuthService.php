<?php

namespace Todo\Service;

use Todo\Entity\User;
use Todo\Helper\FlashMessagesTrait;
use Todo\Repository\UserRepository;

class AuthService
{
    use FlashMessagesTrait;

    private UserRepository $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;

        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => 0,          // Expira ao fechar o navegador
                'path' => '/',            // Válido em todo o site
                'domain' => '',           // Mesmo domínio
                'httponly' => true,       // Impede acesso via JavaScript
                'samesite' => 'Strict'    // Previne ataques CSRF
            ]);

            session_start();
            session_regenerate_id(true);
        }
    }

    public function authenticate(string $email, string $password): ?User
    {
        $user = $this->userRepository->findByAny('email', $email);
        $dbPassword = password_hash(' ', PASSWORD_ARGON2ID);

        if ($user) {
            $dbPassword = $user->password;
        }

        $correctPWD = password_verify($password, $dbPassword);

        if (!$correctPWD){
            throw new \Exception("Usuario ou senha incorretos");
            
        }
        
        if(password_needs_rehash($user->password, PASSWORD_ARGON2ID)){
            $hashPWD = password_hash($password, PASSWORD_ARGON2ID);
            $this->userRepository->updatePWD($user->getId(), $hashPWD);
        }

        return $user;
    }


    public function saveUser(array $request): ?User
    {
        $hashPWD = password_hash($request['password'], PASSWORD_ARGON2ID);

        $user = new User($request['name'], $request['email']);
        $user->setPassword($hashPWD);

        return $this->userRepository->add($user);
    }


    public function updateUser()
    {
        // Todo: code logic
    }


    public function updatePWD(array $request)
    {
        $id = $request['id'];
        $email = $request['email'];
        $currentPassword = $request['current_password'];
        $newPassword = $request['password'];


        $user = $this->authenticate($email, $currentPassword);

        if (!$user) {
            throw new \Exception("Senha incorreta!");
        }
        
        $encrypted = password_hash($newPassword, PASSWORD_ARGON2ID);

        $sendToDB = $this->userRepository->updatePWD($id, $encrypted);

        if(!$sendToDB){
            throw new \Exception("Erro ao atualizar a senha, tente novamente em alguns minutos");
        }
    }


    // Pede autenticação
    public function checkAccess($path): void
    {
        $auth_route = ['/login', '/cadastro'];
        $public_route = ['/home'];
        $admin_route = ['/admin'];


        if (!in_array($path, $auth_route) && !in_array($path, $public_route) && !$this->isLogged()){
            header('Location: /home');
        }

        if(in_array($path, $auth_route) && $this->isLogged()){
            header('Location: /');
        }

        if(in_array($path, $admin_route) && !$this->isAdmin()){
            header('Location: /');
        }
    }

    // Verifica se está em uma sessão
    private function isLogged(): bool
    {
        return isset($_SESSION['logado']) && $_SESSION['logado'] === true;
    }

    private function isAdmin(): bool
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    //  Criação de sessão
    public function createSession(User $user): void
    {
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $user->getId();
        $_SESSION['email'] = $user->email;
        $_SESSION['nome'] = $user->name;
        $_SESSION['role'] = $user->role;
    }
}