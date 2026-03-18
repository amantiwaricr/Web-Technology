<?php
include 'dbconnect.php';

if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id']; // sanitize input

    mysqli_query($conn, "DELETE FROM attendance WHERE f_id = $id");
    $result = mysqli_query($conn, "DELETE FROM faculty WHERE id = $id");
    if ($result) {
        header("Location: viewfaculty.php");
        exit;
    }
    else {
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
        body {
            font-family: Arial, sans-serif;
            background-color: #b4d7f7;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            background: #5390f9;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .action-link {
            text-decoration: none;
            color: #0056b3;
            font-family: Arial, sans-serif;
        }

        .action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">Faculty List</div>

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

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
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