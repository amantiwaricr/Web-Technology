<?php
session_start();
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Simple variables (as you originally had)
    $email = $_POST['login-email'];
    $password = $_POST['password'];

    $retrieve = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $retrieve);

    // 2. Check if the user's email actually exists in the database
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // Set basic sessions
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_role'] = $user['user_role'];

            // 3. FIX: Assign the user ID to a simple variable first so it works inside the SQL string!
            $current_user_id = $user['id'];
            $sql = "SELECT id FROM faculty WHERE user_id = $current_user_id";
            $fac_result = mysqli_query($conn, $sql);

            // 4. FIX: Check if they actually have a faculty profile to prevent the "null" warning
            if ($fac_result && mysqli_num_rows($fac_result) > 0) {
                $faculty = mysqli_fetch_assoc($fac_result);
                $_SESSION['faculty_id'] = $faculty['id'];
            }

            // Redirect based on role
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
            // 5. FIX: Pure PHP error message and redirect (No JavaScript)
            echo "<h2>Invalid Password!</h2><p>Redirecting you back to login...</p>";
            header("refresh:2; url=../frontend/index.html"); // Waits 2 seconds, then redirects
            exit();
        }
    }
    else {
        // User email not found
        echo "<h2>No User Found!</h2><p>Redirecting you back to login...</p>";
        header("refresh:2; url=../frontend/index.html"); // Waits 2 seconds, then redirects
        exit();
    }
}
?>