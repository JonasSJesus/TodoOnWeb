<?php

namespace Todo\Controller;

use PDO;

class Connection
{
    private string $host = 'localhost';
    private string $dbname = 'todo2';
    private string $username = 'root';
    private string $password = 'jonassj7';
    private PDO $conn;

    public function __construct()
    {
        $this->conn();
    }

    public static function conn(): PDO
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        return $this->conn;
    }
}