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

    
}
