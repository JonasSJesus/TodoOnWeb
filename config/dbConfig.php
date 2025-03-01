<?php 

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $dbPath = __DIR__ . '/../db.sqlite';
    $pdo = new PDO("sqlite:$dbPath");
} catch (PDOException $e) {
     echo 'Error:' . $e->getMessage();
}

return $pdo;