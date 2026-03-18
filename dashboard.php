<?php
session_start();
include '../backend/dbconnect.php';

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
    header("refresh:1; url=dashboard.php");
  }
  else {
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

// Calculate current month attendance percentage
$curr_month = date('m');
$curr_year = date('Y');
$month_query = "SELECT status FROM attendance WHERE f_id = $id AND MONTH(date) = '$curr_month' AND YEAR(date) = '$curr_year'";
$month_result = mysqli_query($conn, $month_query);

$month_total = 0;
$month_present = 0;
if ($month_result && mysqli_num_rows($month_result) > 0) {
  while ($m_row = mysqli_fetch_assoc($month_result)) {
    $month_total++;
    if (strtolower($m_row['status']) == 'present') {
      $month_present++;
    }
  }
}
$month_percentage = $month_total > 0 ? round(($month_present / $month_total) * 100, 1) : 0;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Faculty Management System</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="app-page dashboard-page">
    <!-- Top Navigation Bar -->
    <header class="site-header">
      <div class="top-bar">
        <div class="brand-block">
          <div class="brand-logo">
            <span>KI</span>
          </div>
          <span class="brand-title">Faculty Management System</span>
        </div>
        <div class="user-block">
          <span>Welcome, <?php echo $_SESSION['username']; ?></span>
          <div class="avatar-badge">
            <span>SM</span>
          </div>
        </div>
      </div>
      <!-- Navigation Menu -->
      <nav class="primary-nav">
        <div class="nav-links">
          <a class="is-active" href="dashboard.php">&#9776; Dashboard</a>
          <a href="attendence.html">&#9745; Attendance</a>
          <a href="profile.php">&#128100; Profile</a>
          <a href="index.html">&#10140; Logout</a>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main class="dashboard-main">
      <!-- Breadcrumb -->
      <nav class="breadcrumb-nav">
        <span>
          <a href="dashboard.php">Home</a>
          <a href="dashboard.php">Home</a>
          <span>&#9656;</span>
          <span>Dashboard</span>
        </span>
      </nav>

      <!-- Page Title -->
      <div class="page-title-wrap">
        <div>
          <h1>Dashboard Overview</h1>
          <p>
          Welcome back! Here's a summary of your academic activity for Spring
          2026.
          </p>
        </div>
        <a href="../backend/editfaculty.php?id=<?php echo urlencode((string)($_SESSION['faculty_id'] ?? '')); ?>" class="action-link">
          Edit Profile
        </a>
      </div>

      <!-- Stat Cards Row -->
      <section class="stats-grid">
        <!-- Card 1 - Total Faculty -->
        <article>
          <div>
            <div>
              <p>Total Faculty</p>
              <p>148</p>
            </div>
            <div>&#128101;</div>
          </div>
          <p>&#9650; 12 new this semester</p>
        </article>

        <!-- Card 2 - Today's Classes -->
        <article>
          <div>
            <span>&#9679; Active</span>
          </div>
        </div>
        <div>
          <div>
            <p><?php echo $month_percentage; ?>%</p>
            <p>This Month</p>
          </div>
        </div>
      </section>

      <!-- Two Column Layout -->
      <div class="dashboard-layout">
        <!-- Left Column - Recent Activity -->
        <section class="dashboard-main-column">
          <!-- Today's Schedule Preview -->
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
            <div>
              <h2>Recent Attendance Summary</h2>
              <a href="attendence.html">View All &#10132;</a>
            </div>
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

        <!-- Right Column - Sidebar Widgets -->
        <aside class="dashboard-sidebar">
          <!-- Quick Links -->
          <article>
            <h3>Quick Actions</h3>
            <a href="attendence.html">&#9745; Mark Attendance</a>
            <a href="schedule.html">&#128197; View Schedule</a>
            <a href="faculty-details.html">&#128101; Faculty Directory</a>
            <a href="profile.php">&#128100; Edit Profile</a>
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