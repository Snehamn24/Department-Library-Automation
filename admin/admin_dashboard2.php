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
    <style type="text/css">
        #side-bar {
            /*background-color: cyan;*/
            padding: 50px;
            width: 300px;
            height: 450px;
        }
        body {
            /*background: linear-gradient(to right, #e0f0ff, #e0f0ff);*/
            /*background: linear-gradient(to right, #e0f0ff, #ffffff);*/
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            margin: 0;
            padding: 0;
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
                        <a class="nav-link" href="../logout.php">Logout</a>
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
                        E-Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bookDropdown">
                        <li><a class="dropdown-item" href="add_books.php">Add New E-Book</a></li>
                        <li><a class="dropdown-item" href="manage_book.php">Manage E-Books</a></li>
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="add_category.php">Add New Category</a></li>
                        <li><a class="dropdown-item" href="manage_category.php">Manage Category</a></li>
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Department Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="add_deptbooks.php">Add Dept. Books</a></li>
                        <li><a class="dropdown-item" href="manage_deptbooks.php">Manage Dept. Books</a></li>
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    
               
            </ul>
        </div>
    </nav>
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="container mt-4">
        <div class="row justify-content-center g-4">
            <!-- Registered Users Card -->
            <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">Registered Students:</div>
                    <div class="card-body">
                        <p class="card-text">Number of total students: <?php echo get_user_count();?></p>
                        <a href="reg_users.php" class="btn btn-outline-primary">View Registered Students</a>
                    </div>
                </div>
            </div>
            <!-- Registered Books Card -->
            
             <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">Registered Professors:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Registered Professors: <?php echo get_professor_count();?></p>
                        <a href="reg_professor.php" class="btn btn-outline-primary">View Registered Professors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">E-Content:</div>
                    <div class="card-body">
                        <p class="card-text">Number of E-Content:<?php echo get_book_count();?> </p>
                        <a href="regbooks.php" class="btn btn-outline-primary">View E-Content</a>
                    </div>
                </div>
            </div>
             
            <!-- Registered Category Card -->
           
            <!-- Registered Authors Card -->
            <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">Registered Department Books:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Department Books: <?php echo get_department_book_count();?></p>
                        <a href="dept_regbooks2.php" class="btn btn-outline-primary">View Department Books</a>
                    </div>
                </div>
            </div>
            <!--View issued books-->
            <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">Books Issued to Professors:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Book Issued: <?php echo get_deptissue_count();?></p>
                        <a href="dept_issued.php" class="btn btn-outline-primary">View Issued Books</a>
                    </div>
                </div>
            </div>
             <!--View Department Requests-->
            <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">Department Requests:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Requests: <?php echo get_deptrequest_count();?></p>
                        <a href="professor_requests.php" class="btn btn-outline-primary">View Requests</a>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="card bg-light">
                    <div class="card-header">Registered Category:</div>
                    <div class="card-body">
                        <p class="card-text">Number of books's Category: <?php echo get_category_count();?></p>
                        <a href="regcat.php" class="btn btn-outline-primary">View Categories</a>
                    </div>
                </div>
            </div>
            
</div>
</div>
</body>
</html>