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
            header('Locatio /admin?sucesso=0');
        }
    }
}
