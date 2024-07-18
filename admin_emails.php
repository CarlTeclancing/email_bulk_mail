<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

include 'db.php';

$emails = $pdo->query("SELECT * FROM submissions ORDER BY created_at DESC")->fetchAll();

if (isset($_POST['export_csv'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=emails.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('Name', 'Email', 'Submitted At'));

    foreach ($emails as $email) {
        fputcsv($output, array($email['name'], $email['email'], $email['created_at']));
    }
    fclose($output);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Emails</title>
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
            <h2>Emails</h2>
            <form method="POST">
                <button type="submit" name="export_csv">Export as CSV</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emails as $email): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($email['name']); ?></td>
                            <td><?php echo htmlspecialchars($email['email']); ?></td>
                            <td><?php echo htmlspecialchars($email['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
