<?php

namespace Todo\Entity;

class User
{
    private int $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    private string $created_at;
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

    

    public function getCreatedAt(): string
    {
        $db_date = $this->created_at;

        return date('d/m/Y', strtotime($db_date));
    }

    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }
}
