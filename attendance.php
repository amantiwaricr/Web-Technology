<?php
session_start();
include 'dbconnect.php';

$id = $_SESSION['faculty_id'];

// Default to showing the current month if no dates are provided
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-t');

// Query attendance for the logged-in faculty within the date range
$query = "SELECT date, status FROM attendance 
          WHERE f_id = $id 
          AND date >= '$start_date' AND date <= '$end_date'
          ORDER BY date DESC";
$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Attendance | Faculty Management System</title>
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
          <span>My Attendance</span>
        </span>
      </nav>

      <div style="max-width: 800px; margin: 0 auto;">
        <!-- Filter Form -->
        <article style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); margin-bottom: 25px;">
          <h2 style="font-size: 18px; color: #1a3a5c; margin-bottom: 20px; border-bottom: 2px solid #e8edf2; padding-bottom: 12px;">&#128197; Filter Attendance by Date Range</h2>
          <form method="GET" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px;">
              <label style="font-size: 13px; color: #5a6a7a; font-weight: 600; margin-bottom: 6px; display: block;">Start Date:</label>
              <input type="date" name="start_date" value="<?php echo $start_date; ?>" required style="width: 100%; padding: 10px; border: 1px solid #dce4ec; border-radius: 8px; box-sizing: border-box; font-size: 14px;">
            </div>
            <div style="flex: 1; min-width: 200px;">
              <label style="font-size: 13px; color: #5a6a7a; font-weight: 600; margin-bottom: 6px; display: block;">End Date:</label>
              <input type="date" name="end_date" value="<?php echo $end_date; ?>" required style="width: 100%; padding: 10px; border: 1px solid #dce4ec; border-radius: 8px; box-sizing: border-box; font-size: 14px;">
            </div>
            <div>
              <button type="submit" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; border: none; padding: 11px 24px; border-radius: 8px; font-weight: 600; cursor: pointer;">Filter</button>
            </div>
          </form>
        </article>

        <!-- Attendance Records -->
        <article style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);">
          <h2 style="font-size: 18px; color: #1a3a5c; margin-bottom: 20px; border-bottom: 2px solid #e8edf2; padding-bottom: 12px;">&#9745; Attendance Records</h2>
          <table style="width: 100%; border-collapse: collapse;">
            <thead>
              <tr>
                <th style="padding: 12px 14px; text-align: left; font-size: 13px; font-weight: 600; color: #7f8c9b; border-bottom: 1px solid #e8edf2;">Date</th>
                <th style="padding: 12px 14px; text-align: left; font-size: 13px; font-weight: 600; color: #7f8c9b; border-bottom: 1px solid #e8edf2;">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $present_count = 0;
              $total_count = 0;

              if ($result && mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $total_count++;
                      if (strtolower($row['status']) == 'present') {
                          $present_count++;
                      }
                      
                      echo "<tr>";
                      echo "<td style='padding: 14px; font-size: 14px; color: #2c3e50; border-bottom: 1px solid #f0f3f6;'>" . $row['date'] . "</td>";
                      
                      if (strtolower($row['status']) == 'present') {
                          echo "<td style='padding: 14px; font-size: 14px; color: #27ae60; border-bottom: 1px solid #f0f3f6; font-weight: bold;'>" . $row['status'] . "</td>";
                      } else {
                          echo "<td style='padding: 14px; font-size: 14px; color: #e74c3c; border-bottom: 1px solid #f0f3f6; font-weight: bold;'>" . $row['status'] . "</td>";
                      }
                      
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='2' style='padding: 14px; font-size: 14px; color: #7f8c9b; text-align: center;'>No attendance records found for this period.</td></tr>";
              }
              ?>
            </tbody>
          </table>

          <?php if ($total_count > 0): ?>
          <div style="margin-top: 20px; padding: 15px; background-color: #f7f9fc; border-radius: 8px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 14px; color: #5a6a7a;"><strong>Summary:</strong> <?php echo $present_count; ?> Present out of <?php echo $total_count; ?> days</span>
            <span style="font-size: 16px; font-weight: bold; color: #3498db;">
              <?php echo round(($present_count / $total_count) * 100, 1); ?>% Attendance
            </span>
          </div>
          <?php endif; ?>
        </article>
      </div>
    </main>

    <footer>
      <p>&copy; 2026 Kathford International &mdash; Faculty Management System. All Rights Reserved.</p>
      <p>Contact IT Support: <span>itsupport@kathford.edu</span> &nbsp;|&nbsp; Phone: +1 (555) 234-5678</p>
    </footer>
  </body>
</html>
