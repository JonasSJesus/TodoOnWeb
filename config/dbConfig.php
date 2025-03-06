<?php 

$dbPath = __DIR__ . '/../database.sqlite';
$pdo = new PDO("sqlite:$dbPath");


return $pdo;