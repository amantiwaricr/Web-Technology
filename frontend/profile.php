<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Faculty Profile - Kathford International Faculty Management System"
    />
    <title>My Profile | Faculty Management System</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <div>
        <div>
          <div><span>KI</span></div>
          <span>Faculty Management System</span>
        </div>
        <div>
          <span>Welcome, <?php echo $_SESSION['username']; ?></span>
          <div><span>SM</span></div>
        </div>
      </div>
      <nav>
        <div>
          <a href="dashboard.php">&#9776; Dashboard</a>
          <a href="attendance.html">&#9745; Attendance</a>
          <a href="faculty-details.html">&#128101; Faculty List</a>
          <a href="profile.php">&#128100; Profile</a>
          <a href="index.html">&#10140; Logout</a>
        </div>
      </nav>
    </header>

    <main>
      <nav>
        <span>
          <a href="dashboard.html">Home</a>
          <span>&#9656;</span>
          <span>My Profile</span>
        </span>
      </nav>

      <!-- Profile Header Card -->
      <section>
        <div>
          <span>SM</span>
        </div>
        <div>
          <h1><?php echo $_SESSION['username']; ?></h1>
          <p>Associate Professor &mdash; Department of Computer Science</p>
          <p>
            Faculty ID: FAC-2024-001 &nbsp;&bull;&nbsp; Joined: August 15, 2018
          </p>
          <div>
            <span>&#9679; Active</span>
            <span>Computer Science</span>
            <span>Full-Time</span>
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
                  <td>Date of Birth</td>
                  <td>July 14, 1985</td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td>Female</td>
                </tr>
                <tr>
                  <td>Email (Official)</td>
                  <td><?php echo $_SESSION['email']; ?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>+1 (555) 101-2001</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>456 Oak Avenue, Apt 12C, Springfield, IL 62704</td>
                </tr>
                <tr>
                  <td>Nationality</td>
                  <td>American</td>
                </tr>
              </tbody>
            </table>
          </article>

          <!-- Academic Qualifications -->
          <article>
            <h2>&#127891; Academic Qualifications</h2>
            <div>
              <p>Ph.D. in Computer Science</p>
              <p>Massachusetts Institute of Technology (MIT)</p>
              <p>
                2012 - 2016 &nbsp;&bull;&nbsp; Thesis: "Efficient Graph
                Algorithms for Large-Scale Data Processing"
              </p>
            </div>
            <div>
              <p>M.S. in Computer Science</p>
              <p>Stanford University</p>
              <p>
                2010 - 2012 &nbsp;&bull;&nbsp; Specialization: Data Structures
                &amp; Algorithms
              </p>
            </div>
            <div>
              <p>B.S. in Computer Science</p>
              <p>University of California, Berkeley</p>
              <p>2006 - 2010 &nbsp;&bull;&nbsp; Graduated Summa Cum Laude</p>
            </div>
          </article>

          <!-- Research & Publications -->
          <article>
            <h2>&#128218; Research &amp; Publications</h2>
            <p>
              Selected recent publications from peer-reviewed journals and
              conferences.
            </p>
            <div>
              <p>
                "Parallel Processing Paradigms for Modern Database Architecture"
              </p>
              <p>IEEE Transactions on Knowledge and Data Engineering, 2025</p>
            </div>
            <div>
              <p>
                "Adaptive Sorting Algorithms for Heterogeneous Computing
                Environments"
              </p>
              <p>ACM Computing Surveys, 2024</p>
            </div>
            <div>
              <p>
                "Machine Learning-Enhanced Query Optimization in Distributed
                Systems"
              </p>
              <p>International Conference on Data Engineering (ICDE), 2023</p>
            </div>
          </article>
        </div>

          <!-- Attendance Summary -->
          <article>
            <div>
              <h2>&#9745; Attendance Summary</h2>
              <a href="attendance.html">View Details &#10132;</a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Class</th>
                  <th>Enrolled</th>
                  <th>Avg %</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CS-301 A</td>
                  <td>42</td>
                  <td><span>91.2%</span></td>
                </tr>
                <tr>
                  <td>CS-405 B</td>
                  <td>35</td>
                  <td><span>83.7%</span></td>
                </tr>
                <tr>
                  <td>CS-302 A</td>
                  <td>43</td>
                  <td><span>94.8%</span></td>
                </tr>
                <tr>
                  <td>CS-501 C</td>
                  <td>38</td>
                  <td><span>88.5%</span></td>
                </tr>
              </tbody>
            </table>
            <div>
              <span>Overall Average Attendance: </span>
              <span>89.6%</span>
            </div>
          </article>

          <!-- Edit Profile Form -->
          <article>
            <h2>&#9998; Edit Profile</h2>
            <form>
              <div>
                <div>
                  <label for="edit-first-name">First Name</label>
                  <input type="text" id="edit-first-name" value="Sarah" />
                </div>
                <div>
                  <label for="edit-last-name">Last Name</label>
                  <input type="text" id="edit-last-name" value="Mitchell" />
                </div>
              </div>
              <div>
                <label for="edit-email">Personal Email</label>
                <input
                  type="email"
                  id="edit-email"
                  value="sarah.mitchell@gmail.com"
                />
              </div>
              <div>
                <label for="edit-phone">Phone Number</label>
                <input type="tel" id="edit-phone" value="+1 (555) 101-2001" />
              </div>
              <div>
                <label for="edit-address">Address</label>
                <input
                  type="text"
                  id="edit-address"
                  value="456 Oak Avenue, Apt 12C, Springfield, IL 62704"
                />
              </div>
              <div>
                <label for="edit-bio">Bio / About</label>
                <textarea id="edit-bio" rows="4">
Passionate educator and researcher specializing in data structures, algorithms, and database systems. Committed to fostering innovative thinking and practical problem-solving skills among students. Currently exploring the intersection of machine learning and traditional database optimization techniques.</textarea
                >
              </div>
              <div>
                <button type="submit">Save Changes</button>
                <button type="reset">Cancel</button>
              </div>
            </form>
          </article>
        </div>
      </div>
    </main>

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

