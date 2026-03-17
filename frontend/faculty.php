<!-- login->faculty (for faculty members) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <label>date:</label>
    <input type="date" name="filterdate" id="date">
</body>
</html>

<?php
include '../backend/dbconnect.php';
$query="SELECT faculty.faculty_name, attendance.date, attendance.status 
FROM attendance 
JOIN faculty ON attendance.f_id = faculty.id
WHERE MONTH(attendance.date) = MONTH(CURDATE()) 
  AND YEAR(attendance.date) = YEAR(CURDATE())
ORDER BY attendance.date DESC;";
$result=mysqli_query($conn,$query);
if($result && mysqli_num_rows($result) > 0) {
    $attendance_records = array();
    while($row = mysqli_fetch_assoc($result)) {
        $attendance_records[] = $row;
    }
} else {
    die("No attendance records found for this month!");
}
?>

<table>
    <tr>
        <th>Faculty Name</th>
        <th>Date</th>
        <th>Status</th>
    </tr>

    <?php foreach($attendance_records as $record): ?>
    <tr>
        <td><?php echo $record['faculty_name']; ?></td>
        <td><?php echo $record['date']; ?></td>
        <td><?php echo $record['status']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>