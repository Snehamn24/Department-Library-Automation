<?php
    //require('functions.php');
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
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style type="text/css">
       #side-bar {
            background-color: lightblue;
            padding: 50px;
            width: 300px;
            height: 450px;
        }
        html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #d6e6f8 50%, #d6e6f8 50%);
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
        .btn btn-success{
            text-decoration: none;
        }
       
        .navbar {
            background: #3a6ea5 !important;
        }

        .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }
        th{
            background-color: #f2f2f2;
        }
    </style> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="../booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;&nbsp; 
        <a class="navbar-brand" href="professor_dashboard.php">Department Library Automation</a>
        
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

   <!--<div class="text-center my-3">
    <img src="deptbook.gif" alt="Library Animation" class="img-fluid" style="height: 150px;width:200px;">
</div>-->

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="900px" style="text-align: center;">
    <tr>
        
        <th>Book Image:</th>
        <th>Book Number:</th>
        <th>Book Name:</th>
        <th>Book Author:</th>
        <th>Book Category:</th>
        <th>Book Isbn:</th>
        <!--<th>Book Price:</th>-->
        <th>No.of Copies:</th>
       
        
        
    </tr>
    <?php
    
    $query = "SELECT * FROM dept_books";
    $result = mysqli_query($connection,$query);
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //$id = $row["id"];

            $book_image = $row["book_image"];
            $imageUrl = "../admin/image/" . $book_image;

            $book_image=$row["book_image"];

             $book_no = $row["book_no"];

            $book_name = $row["book_name"];

            $book_author = $row["book_author"];

            $book_cat = $row["book_category"];

            $book_isbn = $row["book_isbn"];

           // $book_price = $row["book_price"];
   
             $no_book = $row["no_copy"];

            echo "<tr>";
            echo "<td><img src='$imageUrl' alt='$book_name'></td>";
            echo "<td>$book_no</td>";
            echo "<td>$book_name</td>";
            echo "<td>$book_author</td>";
            echo "<td>$book_cat</td>";
            echo "<td>$book_isbn</td>";
            //echo "<td>$book_price</td>";
            echo "<td>$no_book</td>";
            //echo "<td>$book_pdf</td>";
            //echo "<td>
                //<button class='btn btn-success'>
                //<a href='professor_request.php?bi=".($row['book_no'])." ' class='text-white'>Request</a>
                //</button>
            //</td>";
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
