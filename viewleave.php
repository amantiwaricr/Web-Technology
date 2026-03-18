<?php
include 'dbconnect.php';

if (isset($_GET['approve_id'])) {
    $id = (int)$_GET['approve_id']; // Great job sanitizing this!

    $query = "UPDATE leaverequest SET status='approved' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: viewleave.php");
        exit;
    }
    else {
        echo "Error updating record: " . mysqli_error($conn);
        exit;
    }
}
elseif (isset($_GET['reject_id'])) {
    $id = (int)$_GET['reject_id']; // Great job sanitizing this!

    $query = "UPDATE leaverequest SET status='reject' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: viewleave.php");
        exit;
    }
    else {
        echo "Error updating record: " . mysqli_error($conn);
        exit;
    }
}
?>

<?php
include 'dbconnect.php';

$sql = "SELECT * FROM leaverequest where status='applied'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    
    <style>
        h1 {
        margin-top: 40px;
        color: rgb(7, 7, 90);
        }

        body {
        font-family: Arial, sans-serif;
        background-color: #b4d7f7;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        }

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
    <h1>Faculty leave List</h1>
    <table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['reason']; ?></td>

    <td>
    <a href="viewleave.php?approve_id=<?php echo $row['id']; ?>" class="action-link">
        Approve
    </a>
    </td>
    <td>
    <a href="viewleave.php?reject_id=<?php echo $row['id']; ?>" class="action-link">
        Reject
    </a>
    </td>

</tr>
<?php
}?>

</table>
</body>
</html>