<?php
    session_start();
    function get_issue_count(){
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"lms");
        $issue_count="";
        $query="select count(*) as issue_count from pro_issue_book where p_id=".$_SESSION['id'];
        $query_run=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            $issue_count=$row['issue_count'];
        }
        return($issue_count);

    }
    function get_user_requested_book_count(){
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"lms");
        $user_requested_book_count=0;
        $query="select count(*) as user_requested_book_count from pro_book_requests where professor_id=".$_SESSION['id'];
        $query_run=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            $user_requested_book_count=$row['user_requested_book_count'];
        }
        return($user_requested_book_count);
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
    <span><marquee>This is library management system. Library opens at 10:00 AM and closes at 4:00 PM</marquee></span><br><br>
    <div class="container mt-4">
        <div class="row justify-content-center g-5">
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px">
                    <div class="card-header">Issued Books:</div>
                    <div class="card-body">
                        <p class="card-text">Number of total Issued Books: <?php echo get_issue_count();?></p>
                        <a href="view_issued_book.php" class="btn btn-outline-primary">View Issued Books</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px">
                    <div class="card-header">Requested Books:</div>
                    <div class="card-body">
                        <p class="card-text">Number of Requested Books: <?php echo get_user_requested_book_count();?></p>
                        <a href="view_professor_requestedbook.php" class="btn btn-outline-primary">View Requested Books</a>
                    </div>
                </div>
            </div>
        </div>

        <!--fine-->
        <div class="col-md-3">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px">
                    <div class="card-header">Outstanding Fines:</div>
                    <div class="card-body">
                        
                        <a href="view_fine.php" class="btn btn-outline-primary">View Fines</a>
                    </div>
                </div>
            </div>
        </div>
        
   
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
    </div>
    
</div>
</div>
</body>
</html>
