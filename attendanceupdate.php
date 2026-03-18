<?php
include 'dbconnect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $present_ids = isset($_POST['attendance']) ? $_POST['attendance'] : [];


    $today = date('Y-m-d');


    $query = "SELECT id FROM Faculty";
    $all_faculty = mysqli_query($conn, $query);


    while ($row = mysqli_fetch_assoc($all_faculty)) {
        $faculty_id = $row['id'];


        if (in_array($faculty_id, $present_ids)) {
            $status = "Present";
        }
        else {
            $status = "Absent";
        }


        $insert_sql = "INSERT INTO attendance (f_id, date, status) 
                       VALUES ('$faculty_id', '$today', '$status')";

        mysqli_query($conn, $insert_sql);
    }

    echo "<h2>Attendance Submitted Successfully for $today!</h2>";
    echo "<a href='index.html'>Back to List</a>";
}
else {
    echo "Access Denied.";
}
?>