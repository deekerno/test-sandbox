<?php
$host = '127.0.0.1';
$db = 'task_list';
$user = 'root';
$pass = 'tiger';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

session_start();
?>