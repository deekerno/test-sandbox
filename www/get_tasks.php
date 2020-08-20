<?php
// get_tasks.php
include('db_connect.php');

$sql = "SELECT * from tasks WHERE is_deleted = 0 and is_done = 0";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();

foreach ($res as $row) {
    echo '<tr>
          <td>'.$row['task'].'</td>
          <td><button class="is-info" id="edit-btn" internal-id='.$row['id'].'>Edit</button></td>
          <td><button class="is-info" id="completed-btn" internal-id='.$row['id'].'>Completed</button></td>
          <td><button class="is-danger" id="remove-btn" internal-id='.$row['id'].'>Delete</button></td>
          <td></td>
          </tr>';
}
?>