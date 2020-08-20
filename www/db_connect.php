<?php
$host = 'mend-mysql';
$db = 'task_list';
$user = 'root';
$pass = 'tiger';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db";
try {
     $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

session_start();
?>