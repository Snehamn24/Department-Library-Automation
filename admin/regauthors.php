<?php
    require('functions.php');
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $book_isbn="";
    $book_name="";
    $student_id="";
    $address="";
    $password="";
    $query = "SELECT * FROM users";
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
    <style type="text/css">
        #side-bar {
            background-color: lightblue;
            padding: 50px;
            width: 300px;
            height: 450px;
        }
        body {
            background-image: url('bookbackground1.jpg'); /* Path to your image */
            background-size: cover; /* Cover full screen */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* No repeating */
            height: 100vh; /* Full viewport height */
        }
        .custom-btn {
        background-color: rgba(13, 110, 253, 0.2); /* Light Transparent Blue */
        color: #0d6efd; /* Primary Bootstrap Blue */
        border-color: #0d6efd; /* Keep Bootstrap Blue Border */
        transition: 0.3s;
         }

    .custom-btn:hover {
        background-color: rgba(13, 110, 253, 0.6); /* Darker Blue on Hover */
        color: white; /* White Text on Hover */
      }
    </style> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
        </div>&ndsp;&nbsp;&nbsp;
        <font style="color:white"> <span> <strong> Welcome : <?php echo $_SESSION['name'];?> </strong> </span> </font> &nbsp;&nbsp;|&nbsp;&nbsp;&ndsp;&ndsp;&nbsp;
        <font style="color:white"> <span> <strong> Email : <?php echo $_SESSION['email'];?> </strong> </span> </font>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            My Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                    
             </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="bookDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Book
               </a>
               <ul class="dropdown-menu" aria-labelledby="bookDropdown">
              <li><a class="dropdown-item" href="#">Add New Book</a></li>
              <li><a class="dropdown-item" href="#">Manage Books</a></li>
             </ul>
       </li>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="bookDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Category
               </a>
               <ul class="dropdown-menu" aria-labelledby="bookDropdown">
              <li><a class="dropdown-item" href="#">Add New Category</a></li>
              <li><a class="dropdown-item" href="#">Manage Category</a></li>
             </ul>
       </li>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="bookDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Authors
               </a>
               <ul class="dropdown-menu" aria-labelledby="bookDropdown">
              <li><a class="dropdown-item" href="#">Add New Authors</a></li>
              <li><a class="dropdown-item" href="#">Manage New Authors</a></li>
             </ul>
       </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Issue book</a>
                    
             </li>



            </ul>
        </div>
    </nav>
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align: center;">
    <tr>
        <th>Name:</th>
        <th>Email:</th>
        <th>Mobile:</th>
        <th>Address:</th>
    </tr>
    <?php
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

            </form>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>