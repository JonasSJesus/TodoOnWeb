<?php

namespace Todo\Entity;

class User
{
    public readonly int $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly ?int $is_admin;

    public function __construct(string $name, string $email, ?int $is_admin = 0)
    {
        $this->name = $name;
        $this->email = $email;
        $this->is_admin = $is_admin;
    }

    public function setId(int $id): void
    { 
        $this->id = $id;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
}
