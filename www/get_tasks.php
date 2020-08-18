<?php
// get_tasks.php
include('db_connect.php');

$sql = "SELECT * from tasks WHERE is_deleted = 0";

$stmt = $pdo->query($sql);

foreach ($stmt as $row) {
    echo '<tr>
          <td>'.$row['task_text'].'</td>
          <td><button class="edit-btn is-info" internal-id='.$row['id'].'>Edit</button></td>
          <td><button class="remove-btn is-danger" internal-id='.$row['id'].'>Delete</button></td>
          <td></td>
          </tr>';
}
?>