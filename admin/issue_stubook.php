<?php
// Start session and database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('functions.php');
session_start();

$connection = mysqli_connect("localhost", "root", "", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables for book details
$book_num     = $student_id = $student_name = $book_name = $book_image  = "";

// 1) Fetching the request details when admin clicks “Approve”
if (isset($_GET['student_id'], $_GET['book_num'])) {
    $student_id = mysqli_real_escape_string($connection, $_GET['student_id']);
    $book_num   = mysqli_real_escape_string($connection, $_GET['book_num']);

    $query = "
      SELECT 
        s.student_id,
        s.student_name,
        s.book_num,
        s.book_name,
        d.book_image,
        d.no_copy
      FROM student_request s
      JOIN dept_books d ON s.book_num = d.book_no
      WHERE s.student_id = '$student_id'
        AND s.book_num   = '$book_num'
      LIMIT 1
    ";
    $query_run = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($query_run)) {
        $student_name = $row['student_name'];
        $book_name    = $row['book_name'];
        $book_image   = $row['book_image'];
        $no_of_copy   = $row['no_copy'];
    }
}

// 2) When the form is submitted to issue
if (isset($_POST['issue'])) {
    // Gather & sanitize form data
    $student_id   = mysqli_real_escape_string($connection, $_POST['s_id']);
    $student_name = mysqli_real_escape_string($connection, $_POST['s_name']);
    $book_num     = mysqli_real_escape_string($connection, $_POST['book_num']);
    $book_name    = mysqli_real_escape_string($connection, $_POST['book_name']);
    $return_date  = mysqli_real_escape_string($connection, $_POST['return_date']);
    $book_image   = mysqli_real_escape_string($connection, $_POST['book_image']);
    $image_url    = "image/$book_image";

    // —— NEW: Enforce max 3 currently issued books per student ——
    $countSql  = "
      SELECT COUNT(*) AS cnt
        FROM stu_issue_book
       WHERE student_id = '$student_id'
         AND status     = 'Issued'
    ";
    $countRes  = mysqli_query($connection, $countSql);
    $countRow  = mysqli_fetch_assoc($countRes);
    if ((int)$countRow['cnt'] >= 3) {
        echo "<script>
                alert('This student already has 3 books issued. Cannot issue more.');
                window.location.href='student_request.php';
              </script>";
        exit;
    }

    // 3) Prevent issuing the same book twice
    $check_query  = "
      SELECT 1 
        FROM stu_issue_book 
       WHERE student_id = '$student_id' 
         AND book_num    = '$book_num' 
         AND status      = 'Issued'
       LIMIT 1
    ";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>
                alert('This book is already issued to the student.');
                window.location.href='student_request.php';
              </script>";
        exit;
    }

    // 4) Insert the issue record
    $ins = "
      INSERT INTO stu_issue_book
        (student_id, student_name, book_image, book_num, book_name, return_date, status)
      VALUES
        ('$student_id', '$student_name', '$image_url', '$book_num', '$book_name', '$return_date', 'Issued')
    ";
    mysqli_query($connection, $ins);

    // 5) Mark the request approved
    mysqli_query($connection, "
      UPDATE student_request 
         SET status = 'Approved'
       WHERE student_id = '$student_id'
         AND book_num    = '$book_num'
    ");

    // 6) Decrease stock
    mysqli_query($connection, "
      UPDATE dept_books 
         SET no_copy = no_copy - 1
       WHERE book_no = '$book_num'
    ");

    echo "<script>
            alert('Book issued successfully and stock updated!');
            window.location.href='student_request.php';
          </script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Issue Book to Student</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="admin_style.css">


    <style>
      
      body {
            background: #d6e6f8;
        }
        .btn-primary
        {
           background: #3a6ea5;
           border: none;
           border-radius: 30px;
           padding: 12px 25px;
           font-size: 1.1em;
           margin: 10px 0;
           width: 50%;
          color: white;
          transition: 0.4s;
        }
        .btn-primary:hover {
      background: #3a6ea5;
      transform: scale(1.05);
      color: #f9f9f9;
  }
    }
      table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            word-wrap: break-word;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px; /* Adjust as needed */
            height: auto;
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

    

 <div class="container my-4">
    <center><h3>Issue Book to Student</h3></center>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    <form method="post">
      <div class="mb-3">
        <label>Student ID</label>
        <input name="s_id" value="<?=htmlspecialchars($student_id)?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label>Student Name</label>
        <input name="s_name" value="<?=htmlspecialchars($student_name)?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label>Book Number</label>
        <input name="book_num" value="<?=htmlspecialchars($book_num)?>" class="form-control" readonly>
      </div>
      <div class="mb-3 text-center">
        <img src="image/<?=htmlspecialchars($book_image)?>" width="100">
        <input type="hidden" name="book_image" value="<?=htmlspecialchars($book_image)?>">
      </div>
      <div class="mb-3">
        <label>Book Name</label>
        <input name="book_name" value="<?=htmlspecialchars($book_name)?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label>Return Date</label>
        <input type="date" name="return_date"
               value="<?=date('Y-m-d',strtotime('+15 days'))?>"
               class="form-control" required>
      </div>
      <button type="submit" name="issue" class="btn btn-primary">Issue Book</button>
    </form>
  </div>
</div>
</div>
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
