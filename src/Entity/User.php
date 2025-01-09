<?php

namespace Todo\Entity;

class User
{
    public readonly int $id;
    public readonly string $name;
    public readonly string $email;
    public readonly ?string $password;
    public readonly int $is_admin;
    public function __construct(string $name, string $email, ?string $password = null, int $is_admin = 0)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

    public function setId(int $id)
    { 
        $this->id = $id;
    }
}
