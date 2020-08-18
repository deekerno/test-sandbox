<?php
// add_task.php
include('db_connect.php');
$task_text = $_POST['text'];

$sql = "INSERT INTO tasks (task_text) VALUES (?)";
$pdo->prepare($sql)->execute($task_text);
?>