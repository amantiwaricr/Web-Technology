<?php
session_start();
include 'dbconnect.php';

$id = $_SESSION['faculty_id'];

// Handle form submission
if (isset($_POST['apply_leave'])) {
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $fname = $_SESSION['username'];

    $insert = "INSERT INTO leaverequest (f_id, fname, date, reason) 
               VALUES ('$id', '$fname', '$date', '$reason')";

    if (mysqli_query($conn, $insert)) {
        echo "<script>alert('Leave request submitted successfully!'); window.location.href='leaverequest.php';</script>";
    }
    else {
        echo "<script>alert('Submission failed: " . mysqli_error($conn) . "');</script>";
    }
}

// Get recent leave requests for this faculty
$leave_query = "SELECT * FROM leaverequest WHERE f_id = $id ORDER BY date DESC LIMIT 5";
$leave_result = mysqli_query($conn, $leave_query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leave Request | Faculty Management System</title>
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
        <a href="attendance.php">Attendance</a>
        <a href="leaverequest.php">Leave Request</a>
        <a href="index.html" class="logout">Logout</a>
      </nav>
    </header>

    <main>
      <nav>
        <span>
          <a href="dashboard.php">Home</a>
          <span>&#9656;</span>
          <span>Leave Request</span>
        </span>
      </nav>

      <!-- Layout -->
      <div style="display: flex; gap: 25px; flex-wrap: wrap; margin-top: 20px;">
        <div style="flex: 1; min-width: 320px;">
          <!-- Leave Request Form -->
          <article style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
            <h2 style="font-size: 18px; color: #1a3a5c; margin-bottom: 20px; border-bottom: 2px solid #e8edf2; padding-bottom: 12px;">&#9998; Apply for Leave</h2>
            <form method="POST">
              <label style="font-size: 13px; color: #5a6a7a; font-weight: 600; margin-bottom: 6px; display: block;">Date:</label>
              <input type="date" name="date" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #dce4ec; border-radius: 8px; box-sizing: border-box; font-size: 14px; color: #2c3e50;"><br>

              <label style="font-size: 13px; color: #5a6a7a; font-weight: 600; margin-bottom: 6px; display: block;">Reason:</label>
              <textarea name="reason" rows="4" required style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #dce4ec; border-radius: 8px; box-sizing: border-box; font-size: 14px; color: #2c3e50;"></textarea><br>

              <button type="submit" name="apply_leave" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; cursor: pointer; display: block; width: 100%;">Apply Leave</button>
            </form>
          </article>
        </div>

        <div style="flex: 1; min-width: 320px;">
          <!-- History -->
          <article style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
            <h2 style="font-size: 18px; color: #1a3a5c; margin-bottom: 20px; border-bottom: 2px solid #e8edf2; padding-bottom: 12px;">&#128196; Recent Leave Requests</h2>
            <table style="width: 100%; border-collapse: collapse;">
              <thead>
                <tr>
                  <th style="padding: 12px 14px; text-align: left; font-size: 13px; font-weight: 600; color: #7f8c9b; border-bottom: 1px solid #e8edf2;">Date</th>
                  <th style="padding: 12px 14px; text-align: left; font-size: 13px; font-weight: 600; color: #7f8c9b; border-bottom: 1px solid #e8edf2;">Reason</th>
                  <th style="padding: 12px 14px; text-align: left; font-size: 13px; font-weight: 600; color: #7f8c9b; border-bottom: 1px solid #e8edf2;">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
if ($leave_result && mysqli_num_rows($leave_result) > 0) {
    while ($leave_row = mysqli_fetch_assoc($leave_result)) {
        echo "<tr>";
        echo "<td style='padding: 14px; font-size: 14px; color: #2c3e50; border-bottom: 1px solid #f0f3f6;'>" . $leave_row['date'] . "</td>";
        echo "<td style='padding: 14px; font-size: 14px; color: #2c3e50; border-bottom: 1px solid #f0f3f6; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;' title='" . htmlspecialchars($leave_row['reason']) . "'>" . htmlspecialchars($leave_row['reason']) . "</td>";
        echo "<td style='padding: 14px; font-size: 14px; color: #2c3e50; border-bottom: 1px solid #f0f3f6;'><strong>" . ucfirst($leave_row['status']) . "</strong></td>";
        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='3' style='padding: 14px; font-size: 14px; color: #7f8c9b; text-align: center;'>No leave requests applied yet.</td></tr>";
}
?>
              </tbody>
            </table>
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
