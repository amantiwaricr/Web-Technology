<?php
include 'dbconnect.php';

$query="Select id, faculty_name from faculty";
$result=mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0) {
    $faculty_list = array();
    while($row = mysqli_fetch_assoc($result)) {
        $faculty_list[] = $row;
    }
} else {
    die("No faculty found!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="attendanceupdate.php" method="POST">
    <table>
        <tr>
            <th>Faculty ID</th>
            <th>Name</th>
            <th>Status</th>
        </tr>

        <?php foreach($faculty_list as $faculty): ?>
        <tr>
            <td><?php echo $faculty['id']; ?></td>
            <td><?php echo $faculty['faculty_name']; ?></td>
            <td><input type="checkbox" name="attendance[]" value="<?php echo $faculty['id']; ?>"></td> 
            <!-- how this works is if the checkbox is checked, its value (faculty ID) is sent in the POST request -->
        </tr>
        <?php endforeach; ?>
    </table>
    <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>