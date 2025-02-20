<?php

namespace Todo\Service;

use Todo\Entity\User;
use Todo\Repository\UserRepository;

class AuthService
{
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

    public function authenticate(array $request): ?User
    {
        $user = $this->userRepository->findByEmail($request['email']);
        $dbPassword = password_hash(' ', PASSWORD_ARGON2ID);

        if ($user) {
            $dbPassword = $user->password;
        }

        $correctPWD = password_verify($request['password'], $dbPassword);

        if ($correctPWD){
            if(password_needs_rehash($user->password, PASSWORD_ARGON2ID)){
                $hashPWD = password_hash($request['password'], PASSWORD_ARGON2ID);
                $this->userRepository->updatePWD($user->getId(), $hashPWD);
            }

            return $user;
        }

        return null;
    }
    public function saveUser(array $request): ?User
    {
        $hashPWD = password_hash($request['password'], PASSWORD_ARGON2ID);

        $user = new User($request['name'], $request['email']);
        $user->setPassword($hashPWD);

        return $this->userRepository->add($user);
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
            http_response_code(401);
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

}