<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $priority  = mysqli_real_escape_string($conn, $_POST['priority']);
    $category  = mysqli_real_escape_string($conn, $_POST['category']);
    $due_date  = !empty($_POST['due_date']) ? "'".$_POST['due_date']."'" : "NULL";

    $sql = "INSERT INTO tasks (task_name, priority, status, category, due_date)
            VALUES ('$task_name', '$priority', 'Pending', '$category', $due_date)";
    mysqli_query($conn, $sql);
}

header("Location: index.php?added=1");
exit();
?>