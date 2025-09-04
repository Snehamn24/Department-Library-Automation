<?php
    require('functions.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Department Library Automation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #eaf3fb 50%, #d6e6f8 50%);
        }

        .custom-navbar {
            background: linear-gradient(90deg, #3a6ea5, #30597c) !important;
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
        .btn-custom
        {
           background: linear-gradient(to right, #00b4d8, #00b4d8);
           border: none;
           border-radius: 30px;
           padding: 12px 25px;
           font-size: 1.1em;
           margin: 10px 0;
           width: 10%;
          color: white;
          transition: 0.4s;
        }
        .btn-custom:hover {
      background:#;
      transform: scale(1.05);
      color: #f9f9f9;
  }

  .logo {
    font-weight: bold;
    font-size: 2em;
    margin-bottom: 30px;
    color: #61678b;
  }
  .custom-navbar {
  
  background: #301934 ;
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
            background-color: #00b4d8; /* Navy Blue */
            color: white;
            font-weight: bold;
        }

        .btn-outline-primary {
            border-color: #BA96c1;
            color: #044469;
        }

        .btn-outline-primary:hover {
            background-color: #00b4d8;
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
            background-color: #2c3e50; /* Deep Purple */
        }
        .custom-btn:hover {
        background-color: #00b4d8; /* Darker Blue on Hover */
        color: white; /* White Text on Hover */
      }
      .btn-primary{
         background-color: #00b4d8;


      }
      .btn-primary:hover{
        background-color:#00b4d8 ;
      }
    </style> 
</head>
<body>
    
      <nav class="navbar navbar-expand-lg custom-navbar">

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
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#ecategory">E-Category</a>
        <div class="collapse" id="ecategory">
          <ul class="list-unstyled ps-3">
            <li><a href="add_ecategory.php">Add New E-Category</a></li>
            <li><a href="manage_ecategory.php">Manage E-Category</a></li>
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



    
    <marquee>Department Library Automation. Library opens at 10:00 AM and closes at 4:00 PM</marquee><br><br>
    
  <center><a href="../professor/professor_signup_form.php" class="btn btn-primary me-4">Professor sign up</a>
<a href="../signup_form.php" class="btn btn-primary">Student sign up</a></center>
<div class="container-fluid mt-4">
  <div class="d-flex">




    <!-- Right Side: Cards -->
  
        <div style="flex: 2; background: white; border-radius: 25px; padding: 50px; margin: 50px;">
  <div class="row row-cols-1 row-cols-md-4 g-3">
        
        <!-- Registered Students Card--> 
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-people-fill me-2"></i> Registered Students </div>
            <div class="card-body">
              <p class="card-text">Number of total students: <?php echo get_user_count();?></p>
              <a href="reg_users.php" class="btn btn-outline-primary">View Registered Students</a>
            </div>
          </div>
        </div>

        <!-- Registered Professors Card -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-person-badge-fill"></i> Registered Professors</div>
            <div class="card-body">
              <p class="card-text">Number of Registered Professors: <?php echo get_professor_count();?></p>
              <a href="reg_professor.php" class="btn btn-outline-primary">View Registered Professors</a>
            </div>
          </div>
        </div>

        <!-- E-Content -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-journal-bookmark"></i> E-Content</div>
            <div class="card-body">
              <p class="card-text">Number of E-Content: <?php echo get_book_count();?></p>
              <a href="regbooks.php" class="btn btn-outline-primary">View E-Content</a>
            </div>
          </div>
        </div>

        <!-- Department Books -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-collection"></i> Registered Department Books</div>
            <div class="card-body">
              <p class="card-text">Number of Department Books: <?php echo get_department_book_count();?></p>
              <a href="dept_regbooks.php" class="btn btn-outline-primary">View Department Books</a>
            </div>
          </div>
        </div>

        <!-- Books Issued -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-box-arrow-right"></i> Books Issued to Professors</div>
            <div class="card-body">
              <p class="card-text">Number of Book Issued: <?php echo get_deptissue_count();?></p>
              <a href="dept_issued.php" class="btn btn-outline-primary">View Issued Books</a>
            </div>
          </div>
        </div>

        <!-- Department Requests -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-inbox"></i> Department Requests</div>
            <div class="card-body">
              <p class="card-text">Number of Requests: <?php echo get_deptrequest_count();?></p>
              <a href="professor_requests.php" class="btn btn-outline-primary">View Requests</a>
            </div>
          </div>
        </div>
        
        <!--Student Requests -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-person-lines-fill"></i> Student Requests</div>
            <div class="card-body">
              <p class="card-text">Number of Requests: <?php echo get_studentrequest_count();?></p>
              <a href="student_request.php" class="btn btn-outline-primary">Student Requests</a>
            </div>
          </div>
        </div>


        <!--Book Issued To Students -->
        <div class="col">
          <div class="card bg-light">
            <div class="card-header">
            <i class="bi bi-book-half"></i> Book Issued To students</div>
            <div class="card-body">
              <p class="card-text">Number of Book Issue: <?php echo get_studentrequest_count();?></p>
              <a href="student_issue.php" class="btn btn-outline-primary">Issued Book</a>
            </div>
          </div>
        </div>
        
        
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
