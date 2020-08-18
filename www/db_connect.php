<?php
$host = '127.0.0.1';
$db = 'task_list';
$user = 'root';
$pass = 'tiger';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo $error;
}

session_start();
?>