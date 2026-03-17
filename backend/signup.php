<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_password = $_POST["re-password"];
    $user_role = $_POST["user_role"];

    if (!preg_match("/^[a-zA-Z]/", $username)) {
        echo "Error: Username must start with a letter.";
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Email must be valid.";
    }

    elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        echo "Error: Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    elseif ($password !== $re_password) {
        echo "Error: Passwords do not match!!";
    }

    else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sqluser = "insert into users(username, email, password, user_role)
                values ('$username', '$email', '$hashed_password','$user_role');";
        $result = mysqli_query($conn, $sqluser);

        if ($result) {
            if ($user_role == 'user') {
                $sql_find_user = "SELECT id FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql_find_user);

                $row = mysqli_fetch_assoc($result);
                $fetched_user_id = $row['id']; // This is our foreign key!

                $sqlfaculty = "INSERT INTO Faculty (faculty_name, user_id) 
                   VALUES ('$username', '$fetched_user_id')";

                if (mysqli_query($conn, $sqlfaculty)) {
                    echo "signup successful!";
                }
                else {
                    echo "signup failed.";
                }
            }
            else if ($user_role == 'admin') {
                echo "signup successful!";
            }
        }
        else {
            echo "Error: " . mysqli_error($conn);
        }

    }
}
