<?php
// remove_task.php
include('db_connect.php');

$task_id = $_POST['internal-id'];

$sql = "UPDATE tasks SET is_deleted = 1 WHERE id = ?";
$pdo->prepare($sql)->execute($task_id);
?>