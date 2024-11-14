<?php
include 'todolist_db.php';

if (isset($_GET['id'])) {
    $task = $_GET['id'];

    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $task);
    $stmt->execute();
}

header('Location: todolist_index.php');
exit();
?>
