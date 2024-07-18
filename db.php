<?php


$host = 'localhost';
$db = 'student_email_collection';
$user = 'root';
$pass = '';
$port = '33106'; 

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    // Handle connection error gracefully
    // You might want to log the error or display a user-friendly message
}

