<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Faculty Dashboard - Kathford International Faculty Management System"
    />
    <title>Dashboard | Faculty Management System</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Top Navigation Bar -->
    <header>
      <div>
        <div>
          <div>
            <span>KI</span>
          </div>
          <span>Faculty Management System</span>
        </div>
        <div>
          <span>Welcome, Dr. Sarah Mitchell</span>
          <div>
            <span>SM</span>
          </div>
        </div>
      </div>
      <!-- Navigation Menu -->
      <nav>
        <div>
          <a href="dashboard.html">&#9776; Dashboard</a>
          <a href="schedule.html">&#128197; Schedule</a>
          <a href="attendance.html">&#9745; Attendance</a>
          <a href="faculty-details.html">&#128101; Faculty List</a>
          <a href="profile.html">&#128100; Profile</a>
          <a href="index.html">&#10140; Logout</a>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main>
      <!-- Breadcrumb -->
      <nav>
        <span>
          <a href="dashboard.html">Home</a>
          <span>&#9656;</span>
          <span>Dashboard</span>
        </span>
      </nav>

      <!-- Page Title -->
      <div>
        <h1>Dashboard Overview</h1>
        <p>
          Welcome back! Here's a summary of your academic activity for Spring
          2026.
        </p>
      </div>

<?php session_start(); ?>
<a href="../backend/editfaculty.php?id=<?php echo $_SESSION['faculty_id']; ?>" class="action-link">
            Edit
        </a>
      <!-- Stat Cards Row -->
      <section>
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
            <div>
              <p>Today's Classes</p>
              <p>24</p>
            </div>
            <div>&#128218;</div>
          </div>
          <p>5 completed &bull; 3 ongoing &bull; 16 upcoming</p>
        </article>

        <!-- Card 3 - Pending Attendance -->
        <article>
          <div>
            <div>
              <p>Pending Attendance</p>
              <p>7</p>
            </div>
            <div>&#9888;</div>
          </div>
          <p>Requires submission by 5:00 PM</p>
        </article>

        <!-- Card 4 - Active Departments -->
        <article>
          <div>
            <div>
              <p>Departments</p>
              <p>12</p>
            </div>
            <div>&#127979;</div>
          </div>
          <p>All departments active</p>
        </article>
      </section>

      <!-- Two Column Layout -->
      <div>
        <!-- Left Column - Recent Activity -->
        <section>
          <!-- Today's Schedule Preview -->
          <article>
            <div>
              <h2>Today's Schedule</h2>
              <a href="schedule.html">View Full Schedule &#10132;</a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Time</th>
                  <th>Subject</th>
                  <th>Class</th>
                  <th>Room</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>8:00 - 9:00 AM</td>
                  <td>Data Structures</td>
                  <td>CS-301 A</td>
                  <td>Room 204</td>
                  <td><span>Completed</span></td>
                </tr>
                <tr>
                  <td>10:00 - 11:00 AM</td>
                  <td>Algorithm Design</td>
                  <td>CS-405 B</td>
                  <td>Room 312</td>
                  <td><span>Ongoing</span></td>
                </tr>
                <tr>
                  <td>1:00 - 2:00 PM</td>
                  <td>Database Systems</td>
                  <td>CS-302 A</td>
                  <td>Lab 101</td>
                  <td><span>Scheduled</span></td>
                </tr>
                <tr>
                  <td>3:00 - 4:30 PM</td>
                  <td>Software Engineering</td>
                  <td>CS-501 C</td>
                  <td>Room 418</td>
                  <td><span>Scheduled</span></td>
                </tr>
              </tbody>
            </table>
          </article>

          <!-- Recent Attendance Summary -->
          <article>
            <div>
              <h2>Recent Attendance Summary</h2>
              <a href="attendance.html">View All &#10132;</a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Class</th>
                  <th>Date</th>
                  <th>Present</th>
                  <th>Absent</th>
                  <th>Rate</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CS-301 A</td>
                  <td>Mar 14, 2026</td>
                  <td>38</td>
                  <td>4</td>
                  <td>90.5%</td>
                </tr>
                <tr>
                  <td>CS-405 B</td>
                  <td>Mar 13, 2026</td>
                  <td>29</td>
                  <td>6</td>
                  <td>82.9%</td>
                </tr>
                <tr>
                  <td>CS-302 A</td>
                  <td>Mar 13, 2026</td>
                  <td>41</td>
                  <td>2</td>
                  <td>95.3%</td>
                </tr>
              </tbody>
            </table>
          </article>
        </section>

        <!-- Right Column - Sidebar Widgets -->
        <aside>
          <!-- Quick Links -->
          <article>
            <h3>Quick Actions</h3>
            <a href="attendance.html">&#9745; Mark Attendance</a>
            <a href="schedule.html">&#128197; View Schedule</a>
            <a href="faculty-details.html">&#128101; Faculty Directory</a>
            <a href="profile.html">&#128100; Edit Profile</a>
          </article>

          <!-- Announcements -->
          <article>
            <h3>&#128227; Announcements</h3>
            <div>
              <p>Mid-Semester Exam Schedule</p>
              <p>
                Exams will be conducted from April 5-12, 2026. Faculty are
                requested to submit question papers by March 28.
              </p>
              <span>March 10, 2026</span>
            </div>
            <div>
              <p>Faculty Meeting Reminder</p>
              <p>
                General faculty meeting scheduled for Friday, March 20 at 3:00
                PM in Conference Hall A.
              </p>
              <span>March 8, 2026</span>
            </div>
            <div>
              <p>System Maintenance Notice</p>
              <p>
                The portal will be under maintenance on Sunday, March 22 from
                2:00 AM to 6:00 AM.
              </p>
              <span>March 6, 2026</span>
            </div>
          </article>

          <!-- Calendar Widget -->
          <article>
            <h3>&#128197; March 2026</h3>
            <table>
              <thead>
                <tr>
                  <th>Sun</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thu</th>
                  <th>Fri</th>
                  <th>Sat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
                  <td>5</td>
                  <td>6</td>
                  <td>7</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>9</td>
                  <td>10</td>
                  <td>11</td>
                  <td>12</td>
                  <td>13</td>
                  <td>14</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>16</td>
                  <td>17</td>
                  <td>18</td>
                  <td>19</td>
                  <td>20</td>
                  <td>21</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>23</td>
                  <td>24</td>
                  <td>25</td>
                  <td>26</td>
                  <td>27</td>
                  <td>28</td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>30</td>
                  <td>31</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </article>
        </aside>
      </div>
    </main>

    <!-- Footer -->
    <footer>
      <p>
        &copy; 2026 Kathford International &mdash; Faculty Management System. All
        Rights Reserved.
      </p>
      <p>
        Contact IT Support: <span>itsupport@kathford.edu</span> &nbsp;|&nbsp;
        Phone: +1 (555) 234-5678 &nbsp;|&nbsp; Campus: 1200 Academic Drive,
        Springfield
      </p>
    </footer>
  </body>
</html>

