<?php
include 'dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST['faculty_id'];
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
                    header("Location: ../frontend/dashboard.html");
                    exit();
                }
                else
                    {
                        die("Invalid Password");
                        header("Location: ../frontend/login.html");
                    }
    }
?>