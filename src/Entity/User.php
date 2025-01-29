<?php

namespace Todo\Entity;

class User
{
    public readonly int $id;
    public readonly string $name;
    public readonly string $email;
    private ?string $password;
    public readonly int $is_admin;

    public function __construct(string $name, string $email, ?string $password = null, int $is_admin = 0)
    {
        $this->name = $name;
        $this->email = $email;
        $this->setPassword($password);
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

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
}
