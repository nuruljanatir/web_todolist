<?php
include 'todolist_db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        header('Location: todolist_index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $task = $_POST['task'];

        if (empty($task)) {
            echo "Tugas tidak boleh kosong!";
            exit();
        }

        $query = "UPDATE tasks SET task = :task WHERE id = :id";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: todolist_index.php');
            exit();
        } else {
            echo "Gagal memperbarui tugas.";
        }
    }
} else {
    header('Location: todolist_index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas - To Do List</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Edit Tugas</h2>
    
    <form action="todolist_edit.php?id=<?= htmlspecialchars($task['id']); ?>" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']); ?>">
        <label for="task">Tugas:</label><br>
        <input type="text" id="task" name="task" value="<?= htmlspecialchars($task['task']); ?>" required><br><br>
        <input type="submit" value="Update Tugas">
    </form>

    <br><a href="todolist_index.php">Kembali ke Daftar Tugas</a>
</body>
</html>
