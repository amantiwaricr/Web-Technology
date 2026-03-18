<?php
session_start();
include 'dbconnect.php';

$id = $_SESSION['faculty_id'];

// Handle form submission
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];

    $update = "UPDATE faculty SET
                faculty_name='$name',
                gender='$gender',
                faculty_phone='$phone',
                faculty_address='$address',
                faculty_designation='$designation'
               WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        header("refresh:1; url=profile.php");
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}

// Get faculty info
$sql = "SELECT * FROM faculty WHERE id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
}

// Get attendance for past 5 days
$att_query = "SELECT date, status FROM attendance WHERE f_id = $id ORDER BY date DESC LIMIT 5";
$att_result = mysqli_query($conn, $att_query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile | Faculty Management System</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <div class="header-top">
        <span class="site-name">Faculty Management System</span>
        welcome, <?php echo $_SESSION['username']; ?>
      </div>
      <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="attendance.html">Attendance</a>
        <a href="profile.php">Profile</a>
        <a href="index.html" class="logout">Logout</a>
      </nav>
    </header>

    <main>
      <nav>
        <span>
          <a href="dashboard.php">Home</a>
          <span>&#9656;</span>
          <span>My Profile</span>
        </span>
      </nav>

      <!-- Profile Header Card -->
      <section>
        <div>
          <span>F</span>
        </div>
        <div>
          <h1><?php echo $_SESSION['username']; ?></h1>
          <div>
            <span>&#9679; Active</span>
          </div>
        </div>
        <div>
          <div>
            <p>4</p>
            <p>Subjects</p>
          </div>
          <div>
            <p>158</p>
            <p>Students</p>
          </div>
          <div>
            <p>7.5</p>
            <p>Years Exp</p>
          </div>
        </div>
      </section>

      <!-- Two Column Layout -->
      <div>
        <!-- Left Column -->
        <div>
          <!-- Personal Details -->
          <article>
            <h2>&#128100; Personal Information</h2>
            <table>
              <tbody>
                <tr>
                  <td>Full Name</td>
                  <td><?php echo $_SESSION['username']; ?></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td><?php echo $row['gender']; ?></td>
                </tr>
                <tr>
                  <td>Email (Official)</td>
                  <td><?php echo $_SESSION['email']; ?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?php echo $row['faculty_phone']; ?></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td><?php echo $row['faculty_address']; ?></td>
                </tr>
              </tbody>
            </table>
          </article>

          <!-- Attendance Summary -->
          <article>
            <h2>&#9745; My Attendance (Last 5 Days)</h2>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
if ($att_result && mysqli_num_rows($att_result) > 0) {
    while ($att_row = mysqli_fetch_assoc($att_result)) {
        echo "<tr>";
        echo "<td>" . $att_row['date'] . "</td>";
        echo "<td>" . $att_row['status'] . "</td>";
        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='2'>No attendance records found.</td></tr>";
}
?>
              </tbody>
            </table>
          </article>

          <!-- Edit Profile -->
          <article>
            <h2>&#9998; Edit Profile</h2>
            <form method="POST">
              Name:<br>
              <input type="text" name="name" value="<?php echo $row['faculty_name']; ?>"><br><br>

              Phone:<br>
              <input type="text" name="phone" value="<?php echo $row['faculty_phone']; ?>"><br><br>

              Gender:<br>
              <select name="gender">
                <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if ($row['gender'] == 'Other') echo 'selected'; ?>>Other</option>
              </select><br><br>

              Address:<br>
              <input type="text" name="address" value="<?php echo $row['faculty_address']; ?>"><br><br>

              Designation:<br>
              <input type="text" name="designation" value="<?php echo $row['faculty_designation']; ?>"><br><br>

              <input type="submit" name="update" value="Save Changes">
            </form>
          </article>
        </div>
      </div>
    </main>

    <footer>
      <p>&copy; 2026 Kathford International &mdash; Faculty Management System. All Rights Reserved.</p>
      <p>Contact IT Support: <span>itsupport@kathford.edu</span> &nbsp;|&nbsp; Phone: +1 (555) 234-5678</p>
    </footer>
  </body>
</html>
