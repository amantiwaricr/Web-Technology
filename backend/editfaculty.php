<?php
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $sql = "SELECT * FROM faculty WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Error: " . mysqli_error($conn));
    }
} 
else 
{
    die("No ID received");
}

// =====================
// 2. UPDATE DATA
// =====================
if (isset($_POST['update'])) {

    $id = (int) $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];

    $update = "UPDATE faculty SET 
                faculty_name='$name',
                faculty_phone='$phone',
                faculty_address='$address',
                faculty_designation='$designation'
               WHERE id=$id;";

    if (mysqli_query($conn, $update)) {
        header("refresh:1; url=viewfaculty.php");
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty</title>
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #b4d7f7;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
}

h2 {
    color: #1a3d7c;
    margin-bottom: 20px;
}

form {
    background-color: white;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    width: 350px;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 25px;
    background-color: #3399ff;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background-color: navy;
    transform: scale(1.05);
}
</style>
<body>

<h2>Edit Faculty</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Name:<br>
    <input type="text" name="name" value="<?php echo $row['faculty_name']; ?>"><br><br>

    Phone:<br>
    <input type="text" name="phone" value="<?php echo $row['faculty_phone']; ?>"><br><br>

    Address:<br>
    <input type="text" name="address" value="<?php echo $row['faculty_address']; ?>"><br><br>

    Designation:<br>
    <input type="text" name="designation" value="<?php echo $row['faculty_designation']; ?>"><br><br>

    <input type="submit" name="update" value="Update">

</form>

</body>
</html>