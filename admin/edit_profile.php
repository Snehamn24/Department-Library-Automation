<?php
    session_start();
    $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $name="";
              $email="";
              $mobile="";
              $address="";
              $query = "SELECT * FROM admins WHERE email = '$_SESSION[email]'";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){ 
                $name=$row['name'];
                $email=$row['email'];
                $mobile=$row['mobile'];
                $address=$row['address'];
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
    <style type="text/css">
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
      background: linear-gradient(to right, #3a6ea5, #3a6ea5);
      transform: scale(1.05);
      color: #f9f9f9;
  }

  .logo {
    font-weight: bold;
    font-size: 2em;
    margin-bottom: 30px;
    color: #61678b;
  }
  
  .navbar {
            background-color: #3a6ea5 !important; /* Deep Purple */
        }

        .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }

        .main-container {
            display: flex;
            flex-direction: row;
            height: calc(100vh - 100px); /* Adjust for navbar + marquee */
            width: 100%;
        }
        

  .logo {
    font-weight: bold;
    font-size: 2em;
    margin-bottom: 30px;
    color: #61678b;
  }
  
       marquee {

            padding: 5px;
            font-weight: bold;
            color: black;
        }
         /* Sidebar styling */
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
        background-color: #fadada; /* Darker Blue on Hover */
        color: white; /* White Text on Hover */
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
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="update.php" method="post" onsubmit="return validateFunction();">
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" value="<?php echo $name;?>" name="name" id="name"> 
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" value="<?php echo $email;?>" name="email" id="email"> 
                </div>
                <div class="form-group mb-3">
                    <label for="mobile">Mobile:</label>
                    <input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile" id="mobile"> 
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address:</label>
                  <textarea rows="3" cols="40" name="address" class="form-control" id="address"><?php echo $address;?></textarea>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script>

   function validateFunction() {
            var name = document.getElementById("name").value;
            var regex = /^[A-Za-z\s]+$/;
            if (!regex.test(name)) {
                alert("Only alphabets and spaces are allowed in the Full Name field.");
                document.getElementById("name").value = "";
                return false;
            }

            var email = document.getElementById("email").value;
            var emailv = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailv.test(email)) {
                alert("Invalid email");
                document.getElementById("email").value = "";
                return false;
            }

            var mobile = document.getElementById("mobile").value;
            var mobileRegex = /^(\+91)?[6-9]\d{9}$/;
            if (!mobileRegex.test(mobile)) {
                alert("Invalid mobile number! Enter a valid 10-digit number.");
                document.getElementById("mobile").value = "";
                return false;
            }

            var address = document.getElementById("address").value;
            var addressRegx = /^[a-zA-Z0-9\s,.-]{5,}$/;
            if (!addressRegx.test(address)) {
                alert("Invalid address");
                document.getElementById("address").value = "";
                return false;
            }

            return true;
        }

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
