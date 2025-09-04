<?php
session_start();
$connection = mysqli_connect("localhost","root","","lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Flash message
if (!empty($_SESSION['msg'])) {
    echo '<div class="alert alert-info text-center">'.htmlspecialchars($_SESSION['msg']).'</div>';
    unset($_SESSION['msg']);
}

// 1) Fetch issued books with status & issue_id
$query = "
  SELECT 
    issue_id,
    book_name,
    book_num,
    issue_date,
    return_date,
    status
  FROM stu_issue_book
  WHERE student_id = {$_SESSION['id']}
";
$query_run = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>Issued Books</title>
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
     html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #d6e6f8 50%, #d6e6f8 50%);
        }
    .navbar 
    { 
      background-color: #3a6ea5 !important; 
    }
    .navbar .nav-link, .navbar-brand, .navbar .text-white strong { color: #fff !important; }
    table {
         width: 100%; border-collapse: collapse; margin-top: 20px;
      }

    th, td { 
      border: 1px solid #dee2e6; padding: 10px; text-align: center;
       }


    th 
    {
     background-color: #f2f2f2; 
   }
  </style>
</head>
<body>
  <!-- Navbar here... -->

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;&nbsp; 
        <a class="navbar-brand" href="student_dashboard.php">Department Library Automation</a>
        
        <div class="d-flex align-items-center text-white ms-3">
            <strong>Welcome: <?php echo $_SESSION['name']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>Email: <?php echo $_SESSION['email']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>User-Id: <?php echo $_SESSION['id']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="nav-link d-flex align-items-center" href="user_search.php" title="Search">
                <i class="bi bi-search" style="font-size: 1.2rem;"></i>&nbsp;
                Search 
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="person_icon.png" alt="Profile" style="height: 25px; width: 25px; margin-right: 5px;">
                        My Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="view_profile.php"><i class="bi bi-person-circle"></i>
                        View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_profile.php"><i class="bi bi-pen-fill"></i>
                        Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_password.php"><i class="bi bi-key-fill"></i>
                        Change Password</a></li>
                        <li><a class="dropdown-item" href="student_activity.php"><i class="bi bi-list-task"></i>
                        Activity</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="logout.php">
                        <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; margin-right: 5px;"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

  <div class="container mt-4">
    <h4>Your Issued Books</h4>
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>Book Name</th>
          <th>Book Number</th>
          <th>Issue Date</th>
          <th>Return Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($query_run) > 0): ?>
          <?php while ($row = mysqli_fetch_assoc($query_run)): ?>
            <tr>
              <td><?= htmlspecialchars($row['book_name']) ?></td>
              <td><?= htmlspecialchars($row['book_num']) ?></td>
              <td><?= htmlspecialchars($row['issue_date']) ?></td>
              <td><?= htmlspecialchars($row['return_date']) ?></td>
              <td>
                <?php if ($row['status'] === 'Issued'): ?>
                  <a href="return.php?issue_id=<?= $row['issue_id'] ?>&book_num=<?= urlencode($row['book_num']) ?>"
                     class="btn btn-sm btn-warning"
                     onclick="return confirm('Return “<?= addslashes($row['book_name']) ?>”?');">
                    Return
                  </a>
                <?php else: ?>
                  <button class="btn btn-sm btn-secondary" disabled>Returned</button>
                <?php endif; ?>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center">No issued books found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
