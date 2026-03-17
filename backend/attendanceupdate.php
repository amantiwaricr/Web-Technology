<?php
include 'dbconnect.php';

// 1. Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Capture the array of checked faculty IDs
    // If no checkboxes were clicked, $present_ids will be an empty array
    $present_ids = isset($_POST['attendance']) ? $_POST['attendance'] : [];
    
    // 3. Get today's date in YYYY-MM-DD format
    $today = date('Y-m-d');

    // 4. Get all faculty from the database to loop through them
    $query = "SELECT id FROM Faculty";
    $all_faculty = mysqli_query($conn, $query);

    // 5. Loop through every faculty member
    while ($row = mysqli_fetch_assoc($all_faculty)) {
        $faculty_id = $row['id'];

        // Check if this specific faculty ID exists in our 'present' array
        if (in_array($faculty_id, $present_ids)) {
            $status = "Present";
        } else {
            $status = "Absent";
        }

        // 6. Run the simple INSERT query
        $insert_sql = "INSERT INTO attendance (f_id, date, status) 
                       VALUES ('$faculty_id', '$today', '$status')";
        
        mysqli_query($conn, $insert_sql);
    }

    echo "<h2>Attendance Submitted Successfully for $today!</h2>";
    echo "<a href='index.html'>Back to List</a>";
} else {
    echo "Access Denied.";
}
?>