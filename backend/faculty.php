<?php
include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST["name"];
        $number = $_POST["number"];
        $address = $_POST["address"];
        $designation = $_POST["designation"];

        if (!preg_match("/^[a-zA-Z]/", $name)) {
        echo "Error: Name must start with a letter.";
        }

        elseif (!preg_match("/^[0-9]{10}$/", $number)) {
            echo "Error: Phone number must be a valid 10-digit number.";
        }

        else{
            $sql = "insert into faculty(faculty_name, faculty_phone, faculty_address, faculty_designation)
                values ('$name', '$number', '$address', '$designation');";
                $result = mysqli_query($conn, $sql);
                
                if($result)
                {
                    echo "Successfully entered the info...!!";
                }
                else
                {
                    echo "Error: " . mysqli_error($conn);
                }

        }
    }






