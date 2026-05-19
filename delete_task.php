<?php
include 'includes/db.php';
$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
header("Location: index.php?deleted=1");
exit();
?>