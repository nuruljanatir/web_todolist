<?php
include 'todolist_db.php';

if (isset($_POST['complete'])) {
    $task = $_POST['complete'];

    $query = "UPDATE tasks SET is_completed = NOT is_completed WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $task);
    $stmt->execute();
}

header('Location: todolist_index.php');
exit();
?>
