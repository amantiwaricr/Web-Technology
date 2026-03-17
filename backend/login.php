<?php
session_start();
include 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $password = $_POST['password'];
    $retrieve = "Select * from users where email='$email'";
    $result = mysqli_query($conn, $retrieve);
    if (!$result) {
        die("No User Found!");
    }
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        if ($user['user_role'] == 'admin') {
            header("Location: ../frontend/admin-dashboard.html");
            exit();
        }
        else if ($user['user_role'] == 'user') {
            header("Location: ../frontend/dashboard.php");
            exit();
        }
    }
    else {
        die("Invalid Password");
        header("Location: ../frontend/index.html");
    }
}
?>