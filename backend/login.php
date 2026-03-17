<?php
include 'dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST['login-email'];
        $password=$_POST['password'];
        $retrieve="Select * from users where email='$email'";
        $result=mysqli_query($conn,$retrieve);
        if(!$result)
            {
                die("No User Found!");
            }
            $user=mysqli_fetch_assoc($result);
            if(password_verify($password, $user['password']))
                {
                    
                    if($user['user_role'] == 'admin') {
                        header("Location: ../frontend/admin-dashboard.html");
                        exit();
                    } else if($user['user_role'] == 'faculty') {
                        header("Location: ../frontend/faculty-dashboard.html");
                        exit();
                    }
                }
                else
                    {
                        die("Invalid Password");
                        header("Location: ../frontend/login.html");
                    }
    }
?>