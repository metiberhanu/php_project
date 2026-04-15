<?php
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <a href="dashboard.php" class="logo">Logo</a>
        <nav>
            <a href="dashboard.php">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </nav>
        <div class="user-auth">
            <div class="profile-box">
                <div class="avatar"><?= strtoupper(substr($_SESSION['user_name'], 0, 1)); ?></div>
                <div class="dropdown">
                    <span class="user-name"><?= htmlspecialchars($_SESSION['user_name']); ?></span>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <section class="dashboard">
        <div class="dashboard-content">
            <h1>Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?>!</h1>
            <p>Email: <?= htmlspecialchars($_SESSION['user_email']); ?></p>
            <p>You have successfully logged in to your account.</p>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>