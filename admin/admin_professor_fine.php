<?php
session_start();

// 0) Database connection
$conn = mysqli_connect("localhost", "root", "", "lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 1) Handle “Mark Paid” action
if (isset($_GET['mark_paid'])) {
    $fine_id = (int)$_GET['mark_paid'];
    $upd = $conn->prepare("
        UPDATE professor_fines 
           SET status = 'paid' 
         WHERE fine_id = ?
    ");
    $upd->bind_param("i", $fine_id);
    $upd->execute();
    header('Location: admin_professor_fine.php');
    exit;
}

// 2) Auth check
if (!isset($_SESSION['id'])) {
    // Not logged in as any user, send to login
    header('Location: index.php');
    exit;
}

// 3) Fetch all fines
$sql = "
  SELECT 
    pf.fine_id,
    pf.professor_id,
    p.p_name        AS professor_name,
    pf.book_id,
    d.book_no      AS book_num,
    d.book_name,
    pf.days_late,
    pf.fine_amount,
    pf.status,
    DATE_FORMAT(pf.calculated_on, '%Y-%m-%d %H:%i') AS calculated_on
  FROM professor_fines pf
  JOIN professor   p ON pf.professor_id = p.p_id
  JOIN dept_books   d ON pf.book_id      = d.sno
  ORDER BY pf.calculated_on DESC
";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin – Professor Fines</title>
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <style type="text/css">
    body{
      background: #d6e6f8;
    }

.navbar {
  
  background: #3a6ea5 !important ;
  transition: background 0.5s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
  font-weight: bold;
  color: #ffffff !important;
}
.home-icon i {
  color: #ffffff;
  transition: transform 0.3s ease;
}

.home-icon i:hover {
  transform: scale(1.2);
  color: #f0f0ff;
}
.logo1 {
    font-weight: bold;
    margin-bottom: 30px;
    color: #61678b;
    text-decoration: underline;
  }
          .card {
            
             height: 150px;
            max-width: 300px;
            width: 100%; 
        }

        .card-header {
            background-color: #BA96c1; /* Medium purple */
            color: white;
            font-weight: bold;
        }

        .btn-outline-primary {
            border-color: #BA96c1;
            color: #5e17eb;
        }

        .btn-outline-primary:hover {
            background-color: #9c8cb9;
            color: white;
        }

        marquee {

            padding: 5px;
            font-weight: bold;
            color: black;
        }
         /* Sidebar styling */
   
        .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: -250px;
      background-color: #2c3e50;
      padding-top: 60px;
      transition: 0.3s;
      z-index: 1000;
    }

.sidebar.active {
      left: 0;
    }

    .sidebar ul li {
      padding: 5px 20px;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      display: block;
    }

    .sidebar ul li a:hover {
      background-color: blue;
    }

    .menu-icon {
      font-size: 1.5rem;
      color: white;
      padding: 0px;
      left: 0px;
      cursor: pointer;
    }

    .topbar {
     
      color: white;
      padding: 5px;
    }
    .navbar-brand{
        font-size: 25px !important;
        padding-top: 500px;
        padding-bottom: 100px;

    }
    .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }
         .navbar {
            background-color: #3a6ea5; /* Deep Purple */
        }
        .custom-btn:hover {
        background-color: #fadada; /* Darker Blue on Hover */
        color: white; /* White Text on Hover */
      } 
      button a{
        text-decoration: none;
       

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

      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#fine">Fine Calculation</a>
        <div class="collapse" id="fine">
          <ul class="list-unstyled ps-3">
            <li><a href="admin_professor_fine.php">Professor</a></li>
            <li><a href="admin_student_fine.php">Students</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
<center>  
<button>  <a href="professor_fine.php"> Calculate Fine </a></button></center>
  <div class="container mt-5">
    <h2>Professor Fines</h2>
    <table class="table table-striped table-bordered">
      <thead class="table-light">
        <tr>
          <th>Professor</th>
          <th>Book Num</th>
          <th>Book Name</th>
          <th>Days Late</th>
          <th>Fine (₹)</th>
          <th>Status</th>
          <th>Calculated On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td>
            <?= htmlspecialchars($row['professor_name']) ?>
            (ID <?= $row['professor_id'] ?>)
          </td>
          <td><?= htmlspecialchars($row['book_num']) ?></td>
          <td><?= htmlspecialchars($row['book_name']) ?></td>
          <td><?= htmlspecialchars($row['days_late']) ?></td>
          <td><?= number_format($row['fine_amount'], 2) ?></td>
          <td><?= ucfirst($row['status']) ?></td>
          <td><?= $row['calculated_on'] ?></td>
          <td>
            <?php if ($row['status'] === 'unpaid'): ?>
              <a href="?mark_paid=<?= $row['fine_id'] ?>"
                 class="btn btn-sm btn-success"
                 onclick="return confirm('Mark fine #<?= $row['fine_id'] ?> as paid?')">
                Mark Paid
              </a>
            <?php else: ?>
              <button class="btn btn-sm btn-secondary" disabled>Paid</button>
            <?php endif; ?>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

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
