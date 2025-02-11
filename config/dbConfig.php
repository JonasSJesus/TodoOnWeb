<?php 

require_once __DIR__ . '/../vendor/autoload.php';

try {
     $pdo = new PDO();
} catch (PDOException $e) {
     echo 'Error:' . $e->getMessage();
}