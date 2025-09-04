<?php
session_start();

// 0) Database connection
$conn = mysqli_connect("localhost", "root", "", "lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 1) Auth check — ensure professor is logged in
if (!isset($_SESSION['id'])) {
    header('Location: professor_login.php');
    exit;
}
$professor_id = (int)$_SESSION['id'];

// 2) Fetch this professor's fines
$sql = "
  SELECT 
    pf.fine_id,
    d.book_no,
    d.book_name,
    pf.days_late,
    pf.fine_amount,
    pf.status,
    DATE_FORMAT(pf.calculated_on, '%Y-%m-%d') AS calculated_on
  FROM professor_fines pf
  JOIN dept_books d ON pf.book_id = d.sno
  WHERE pf.professor_id = ?
  ORDER BY pf.calculated_on DESC
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $professor_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Professor Dashboard — Fines</title>
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <style>

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #dee2e6 !important;
    }

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

     .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }

         .btn-outline-primary:hover
   {
    background-color:#3a6ea5 ;
   }
   
  </style>
</head>
<body>
  <!-- (Optional) Include your navbar or sidebar here -->

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="../booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;&nbsp; 
        <a class="navbar-brand" href="professor_dashboard.php">Dashboard</a>
        
        <div class="d-flex align-items-center text-white ms-3">
            <strong>Welcome: <?php echo $_SESSION['name']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>Email: <?php echo $_SESSION['email']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>User-Id: <?php echo $_SESSION['id']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="nav-link d-flex align-items-center" href="professor_search.php" title="Search">
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
                        <img src="../person_icon.png" alt="Profile" style="height: 25px; width: 25px; margin-right: 5px;">
                        My Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="view_professor_profile.php"><i class="bi bi-person-circle"></i>
                        View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_professor_profile.php"><i class="bi bi-pen-fill"></i>
                        Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_professor_password.php"><i class="bi bi-key-fill"></i>
                        Change Password</a></li>
                        <li><a class="dropdown-item" href="professor_activity.php"><i class="bi bi-list-task"></i>
                        Activity</a></li>
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
 <button class="btn btn-outline-primary ms-3 mt-2">
      <a href="professor_activity.php" style="text-decoration: none;color: black;">Back</a>
    </button>
  <div class="container mt-5">
    <h3 class="mb-4">Your Outstanding Fines</h3>
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>Book Num</th>
          <th>Book Name</th>
          <th>Days Late</th>
          <th>Fine (₹)</th>
          <th>Status</th>
          <th>Calculated On</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['book_no']) ?></td>
              <td><?= htmlspecialchars($row['book_name']) ?></td>
              <td><?= htmlspecialchars($row['days_late']) ?></td>
              <td><?= number_format($row['fine_amount'], 2) ?></td>
              <td><?= ucfirst($row['status']) ?></td>
              <td><?= $row['calculated_on'] ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center">No fines to display.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
