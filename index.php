<?php
require_once 'config.php';

$error = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';
$active_form = $_SESSION['form'] ?? 'login';

// Clear session messages
unset($_SESSION['error']);
unset($_SESSION['success']);
unset($_SESSION['form']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <a href="index.php" class="logo">Meti</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </nav>
        <div class="user-auth">
            <button type="button" class="login-btn-model" id="loginBtn">Login</button>
        </div>
    </header>

    <!-- Hero Section with Background -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Our Website</h1>
            <p>Create an account to access amazing features and personalized experience</p>
        </div>
    </section>

    <!-- Login/Register Modal -->
    <div class="auth-modal" id="authModal">
        <div class="modal-container">
            <button type="button" class="close-modal" id="closeModal">&times;</button>
            
            <!-- Login Form -->
            <div class="form-container login-form <?= $active_form === 'login' ? 'active' : ''; ?>">
                <h2>Login</h2>
                <form action="auth_process.php" method="POST">
                    <div class="input-group">
                        <i class='bx bx-envelope'></i>
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="input-group">
                        <i class='bx bx-lock'></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="login_btn" class="btn-submit">Login</button>
                    <p class="switch-form">Don't have an account? <a href="#" id="showRegister">Register</a></p>
                </form>
            </div>

            <!-- Register Form -->
            <div class="form-container register-form <?= $active_form === 'register' ? 'active' : ''; ?>">
                <h2>Register</h2>
                <form action="auth_process.php" method="POST">
                    <div class="input-group">
                        <i class='bx bx-user'></i>
                        <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="input-group">
                        <i class='bx bx-envelope'></i>
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="input-group">
                        <i class='bx bx-lock'></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="register_btn" class="btn-submit">Register</button>
                    <p class="switch-form">Already have an account? <a href="#" id="showLogin">Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if ($error): ?>
    <div class="alert error">
        <i class='bx bx-error-circle'></i>
        <span><?= htmlspecialchars($error); ?></span>
    </div>
    <?php endif; ?>

    <?php if ($success): ?>
    <div class="alert success">
        <i class='bx bx-check-circle'></i>
        <span><?= htmlspecialchars($success); ?></span>
    </div>
    <?php endif; ?>

    <script src="script.js"></script>
</body>
</html>