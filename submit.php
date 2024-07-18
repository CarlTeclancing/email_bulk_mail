<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO submissions (name, email, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$name, $email]);

    header('Location: index.php');
}

