<?php
include 'todolist_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];

    $query = "INSERT INTO tasks (task) VALUES (:task)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':task', $task);
    $stmt->execute();

    header('Location: todolist_index.php');
    exit();
}
?>

