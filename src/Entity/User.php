<?php

namespace Todo\Entity;

class User
{
    private int $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly ?string $role;

    public function __construct(string $name, string $email, ?string $role = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    public function setId(int $id): void
    { 
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }


    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    
}
