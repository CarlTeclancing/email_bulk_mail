<?php
include 'db.php'; // Make sure this file includes your database connection setup

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Example: Retrieving form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Example: Inserting data into database using PDO
    try {
        $stmt = $pdo->prepare("INSERT INTO submissions (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);

        // Display success message after successful submission
        echo "Submission successful!";

    } catch (PDOException $e) {
        // Display error message if insertion fails
        echo "Error: " . $e->getMessage();
    }
} else {
    // If the request method is not POST, handle accordingly (optional)
    echo "Invalid request method.";
}

