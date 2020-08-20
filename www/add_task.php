<?php
// add_task.php
include('db_connect.php');

$task_text = $_POST['text'];

$sql = "INSERT INTO tasks (task, is_done, is_deleted) VALUES (?, 0, 0)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$task_text]);
?>