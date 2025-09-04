<?php
    session_start();

// Database Connection
$connection = mysqli_connect("localhost", "root", "", "lms");

// Check Connection
if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// SQL Query
$query =   "SELECT p_id , p_name , book_num , book_name , issue_date, return_date , status from pro_issue_book";

$query_run = mysqli_query($connection, $query);

// Check for SQL Errors
if (!$query_run) {
    die("Query Failed: " . mysqli_error($connection));
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System (LMS)</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
      <link rel="stylesheet" type="text/css" href="admin_style.css">
      <style type="text/css">
          html, body {
            
            background:#d6e6f8;
        }
      </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <div class="topbar">
   
   <i class="bi bi-list menu-icon" id="toggleBtn" style="font-size: 1.2rem; margin-right: 1px; color: white;margin-left: 1px;"></i>
&nbsp;&nbsp; 
  </div><div class="navbar-header">
                 <img src="../booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;
                <a class="navbar-brand" href="admin_dashboard.php">Dashboard</a>
            </div>&nbsp;&nbsp;&nbsp;
            <font style="color:white"> <span> <strong> Welcome : <?php echo $_SESSION['name'];?> </strong> </span> </font> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <font style="color:white"> <span> <strong> Email : <?php echo $_SESSION['email'];?> </strong> </span> </font>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><img src="../person_icon.png" alt="Profile" style="height: 25px; width: 25px; margin-right: 5px;">
                            My Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="view_profile.php"><i class="bi bi-person-circle"></i>
                            View Profile</a></li>
                            <li><a class="dropdown-item" href="edit_profile.php"><i class="bi bi-pen-fill"></i>
                            Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change_password.php"><i class="bi bi-key-fill"></i>
                            Change Password</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="../logout.php">
                        <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; margin-right: 5px;"></i> Logout
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
      <li class="l1"><a href="admin_dashboard.php">Dashboard</a></li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#ebooks">E-Books</a>
        <div class="collapse" id="ebooks">
          <ul class="list-unstyled ps-3">
            <li><a href="add_books.php">Add New E-Book</a></li>
            <li><a href="manage_book.php">Manage E-Books</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#category">Category</a>
        <div class="collapse" id="category">
          <ul class="list-unstyled ps-3">
            <li><a href="add_category.php">Add New Category</a></li>
            <li><a href="manage_category.php">Manage Category</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#deptbooks">Department Books</a>
        <div class="collapse" id="deptbooks">
          <ul class="list-unstyled ps-3">
            <li><a href="add_deptbooks.php">Add Dept. Books</a></li>
            <li><a href="manage_deptbooks.php">Manage Dept. Books</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="container mt-4">
        <h2 class="text-center">Department Issued Books</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Professor ID</th>
                    <th>Professor Name</th>
                    <th>Book Number</th>
                    <th>Book Name</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Status </th>
                </tr>
            </thead>
            <tbody>
                 <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <tr>

                            <td><?php echo htmlspecialchars($row['p_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['p_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_num']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['issue_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['return_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                            
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No Book Issues Found</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </div>
        <script>
  const toggleBtn = document.getElementById('toggleBtn');
  const sidebar = document.getElementById('sidebar');

  // Toggle sidebar open/close
  toggleBtn.addEventListener('click', function () {
    sidebar.classList.toggle('active');
  });

  // Optional: Close sidebar when clicking outside of it
  document.addEventListener('click', function (event) {
    if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
      sidebar.classList.remove('active');
    }
  });
</script>
</body>
</html>