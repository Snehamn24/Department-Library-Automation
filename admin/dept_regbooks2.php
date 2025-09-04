<?php
    require('functions.php');
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    
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
    <style type="text/css">
        #side-bar {
            background-color: lightblue;
            padding: 50px;
            width: 300px;
            height: 450px;
        }
        body {
            /*background-image: url('bookbackground1.jpg'); /* Path to your image */
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
            width: 90px; /* Adjust as needed */
            height: auto;
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
                <a class="nav-link dropdown-toggle" href="#" id="bookDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
               Department Books
               </a>
               <ul class="dropdown-menu" aria-labelledby="bookDropdown">
              <li><a class="dropdown-item" href="add_deptbooks.php">Add Books</a></li>
              <li><a class="dropdown-item" href="manage_deptbooks.php">Manage Books</a></li>
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
        <th>SI:</th>
        <th>Book Image:</th>
        <th>Book Number:</th>
        <th>Book Name:</th>
        <th>Book Author:</th>
        <th>Book Category:</th>
        <th>Book Isbn:</th>
        <th>Book Price:</th>
        <th>No.of Copies:</th>
        
        
    </tr>
    <?php
    
    $query = "SELECT * FROM dept_books";
    $result = mysqli_query($connection,$query);
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //$id = $row["id"];
            $si = $row["sno"];

            $book_image = $row["book_image"];
            $imageUrl = "image/" . $book_image;

            $book_image=$row["book_image"];

             $book_no = $row["book_no"];

            $book_name = $row["book_name"];

            $book_author = $row["book_author"];

            $book_cat = $row["book_category"];

            $book_isbn = $row["book_isbn"];

            $book_price = $row["book_price"];

           // $book_pdf = $row["book_pdf"];
           // $fileName = $row["filename"];
            //$imageUrl = "uploads/" . $fileName;

           
             $no_book = $row["no_copy"];

            echo "<tr>";
            echo "<td>$si</td>";
            echo "<td><img src='$imageUrl' alt='$book_name'></td>";
            echo "<td>$book_no</td>";
            echo "<td>$book_name</td>";
            echo "<td>$book_author</td>";
            echo "<td>$book_cat</td>";
            echo "<td>$book_isbn</td>";
            echo "<td>$book_price</td>";
            echo "<td>$no_book</td>";
            //echo "<td>$book_pdf</td>";
           
            echo "</tr>";
            
        }
    }
    ?>
</table>

            </form>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>