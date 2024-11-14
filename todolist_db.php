<?php
    $host = 'localhost';
    $dbname = 'todo_db';
    $username = 'root'; 
    $password = '';     

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Koneksi gagal ' . $e->getMessage();
    }
?>