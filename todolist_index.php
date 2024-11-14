<?php
    include 'todolist_db.php';

    $query = "SELECT * FROM tasks ORDER BY created_at DESC";
    $stmt = $pdo->query($query);
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h1>To-Do List</h1>

    <form action="todolist_create.php" method="POST">
        <input type="text" name="task" required placeholder="Ketik tugas baru di sini">
        <button type="submit">Tambah Tugas</button>
    </form>

    <h2>Daftar Tugas</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <form action="todolist_complete.php" method="POST" style="display:inline;">
                    <input type="checkbox" name="complete" value="<?= $task['id'] ?>" <?= $task['is_completed'] ? 'checked' : '' ?> onchange="this.form.submit()">
                </form>

                <span class="task-text"><?= htmlspecialchars($task['task']) ?></span>
                <a href="todolist_edit.php?id=<?= $task['id'] ?>">Edit</a>
                <a href="todolist_delete.php?id=<?= $task['id'] ?>">Hapus</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
