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