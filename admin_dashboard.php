<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

include 'db.php';

$today_count = $pdo->query("SELECT COUNT(*) FROM submissions WHERE DATE(created_at) = CURDATE()")->fetchColumn();
$week_count = $pdo->query("SELECT COUNT(*) FROM submissions WHERE WEEK(created_at) = WEEK(CURDATE())")->fetchColumn();
$total_count = $pdo->query("SELECT COUNT(*) FROM submissions")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <nav class="sidebar">
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="admin_emails.php">Emails</a></li>
                <li><a href="admin_upload.php">Upload Emails</a></li>
                <li><a href="admin_bulk_email.php">Send Bulk Emails</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <h2>Dashboard</h2>
            <p>Submissions Today: <?php echo $today_count; ?></p>
            <p>Submissions This Week: <?php echo $week_count; ?></p>
            <p>Total Submissions: <?php echo $total_count; ?></p>
        </div>
    </div>
</body>
</html>
