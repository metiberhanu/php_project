<?php
require_once 'config.php';

// Registration
if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Check if email exists
    $check_query = "SELECT email FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = "Email is already registered!";
        $_SESSION['form'] = 'register';
    } else {
        $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['success'] = "Registration successful! Please login.";
            $_SESSION['form'] = 'login';
        } else {
            $_SESSION['error'] = "Registration failed: " . mysqli_error($conn);
            $_SESSION['form'] = 'register';
        }
    }
    
    header('Location: index.php');
    exit();
}

// Login
if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password!";
            $_SESSION['form'] = 'login';
        }
    } else {
        $_SESSION['error'] = "Email not found!";
        $_SESSION['form'] = 'login';
    }
    
    header('Location: index.php');
    exit();
}
?>