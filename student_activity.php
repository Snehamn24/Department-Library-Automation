<?php
    session_start();
    function get_student_issue_book_count(){
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"lms");
        $student_issue_book_count="";
        $query="select count(*) as student_issue_book_count from stu_issue_book where status!='returned' and student_id=".$_SESSION['id'];
        $query_run=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            $student_issue_book_count=$row['student_issue_book_count'];
        }
        return($student_issue_book_count);

    }
    function get_student_requested_book_count(){
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"lms");
        $student_requested_book_count=0;
        $query="select count(*) as student_requested_book_count from student_request where status!='Approved' and student_id=".$_SESSION['id'];
        $query_run=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            $student_requested_book_count=$row['student_requested_book_count'];
        }
        return($student_requested_book_count);
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
            margin: 0;
            padding: 0;
            background: #d6e6f8;/* Light purple background */
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
         .card {
            
             height: 150px;
            max-width: 300px;
            width: 100%; 
        }

        .card-header {
            background-color: #3a6ea5; /* Medium purple */
            color: white;
            font-weight: bold;
        }
         .btn-outline-primary {
            border-color: #BA96c1;
            color: #5e17eb;
        }

        .btn-outline-primary:hover {
            background-color: #3a6ea5;
            color: white;
        }
    </style> 
</head>
<body>
    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;&nbsp; 
        <a class="navbar-brand" href="student_dashboard.php">Dashboard</a>
        
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
    <span><marquee>Department Library Automation. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="container mt-4">
        <div class="row justify-content-center g-5">
    <div class="row">
       
        <div class="col-md-3">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px">
                    <div class="card-header">Requested Books:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Requested Books: <?php echo get_student_requested_book_count();?></p>
                        <a href="view_requested_book.php" class="btn btn-outline-primary">View Requested Books</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px">
                    <div class="card-header">Issued Books:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Issued Books: <?php echo get_student_issue_book_count();?></p>
                        <a href="view_issued_book.php" class="btn btn-outline-primary">View Issued Books</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px">
                    <div class="card-header">Fine Calculation:</div>
                    <div class="card-body">
                        <a href="view_fine.php" class="btn btn-outline-primary">Fine</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3"></div>
    </div>
    
</div>
</div>
</body>
</html>
