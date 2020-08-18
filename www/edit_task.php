<?php
// edit_task.php
include('db_connect.php');
$task_id = $_POST['internal-id'];
$task_text = $_POST['task'];

$sql = "UPDATE tasks SET task_text = ? WHERE id = ?";
$pdo->prepare($sql)->execute([$task_text, $task_id]);
?>