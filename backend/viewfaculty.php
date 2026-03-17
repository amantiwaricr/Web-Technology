<?php
include 'dbconnect.php';

if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];  // sanitize input

    $delete_sql = "DELETE FROM faculty WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: viewfaculty.php");
        exit; // stop further rendering so table reloads fresh
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        exit;
    }
}
?>

<?php
include 'dbconnect.php';

$sql = "SELECT * FROM faculty";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    
    <style>
        .action-link {
            text-decoration: none;
            color: #0056b3; /* Standard link blue */
            font-family: Arial, sans-serif;
        }
        .action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Faculty List</h2>
    <table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Designation</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['faculty_name']; ?></td>
    <td><?php echo $row['faculty_phone']; ?></td>
    <td><?php echo $row['faculty_address']; ?></td>
    <td><?php echo $row['faculty_designation']; ?></td>

    <td>
        <a href="editfaculty.php?id=<?php echo $row['id']; ?>" class="action-link">
            Edit
        </a>
    </td>

    <td>
    <a href="viewfaculty.php?delete_id=<?php echo $row['id']; ?>" class="action-link">
        Delete
    </a>
    </td>

</tr>
<?php } ?>

</table>
</body>
</html>