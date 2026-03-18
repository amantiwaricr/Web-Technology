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
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #b4d7f7;
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        table {
            border-collapse: collapse;
            margin-top: 40px;
        }

        th, td {
            padding: 10px 20px;
            text-align: left;
        }

        th {
            background-color: #3692e9;
            font-size: 20px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3692e9;
            border: none;
            border-radius: 30px; 
            cursor: pointer;
        }

        input[type="checkbox"] {
            display: block;  /* To keep checkbox centered */
            margin: auto;    /* To keep checkbox centered */
            transform: scale(1.5);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="attendanceupdate.php" method="POST">
    <table border="1" cellpadding="10">
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