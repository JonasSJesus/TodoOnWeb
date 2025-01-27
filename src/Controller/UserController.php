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
    
    public function DeleteUser()
    {
        $id = $_GET['id'];

        if($this->repository->delete($id)){
            header('Location: /admin?sucesso=1');
        } else {
            header('Location /admin?sucesso=0');
        }
    }

    public function renderUpdatePg()
    {
        

        $users = $this->repository->findByEmail($email);
        require_once __DIR__ . "/../../view/edit-user.php";
    }

    public function UpdateUser()
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $email = $_GET['email'];

        $user = new User($name, $email);

        if($this->repository->update($id, $user)){
            header('Location: /admin?sucesso=1');
        } else {
            header('Location: /admin?sucesso=0');
        }
    }
}
