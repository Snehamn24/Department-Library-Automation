<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System (LMS)</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <style>
       html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #eaf3fb 50%, #d6e6f8 50%);
            /*background :rgba(216, 236, 247);*/
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

        .left-side {
          flex: 1;
          background-color: #eaf3fb;
          background-image: url('gif1.gif');
          background-repeat: no-repeat;
          background-position: left center;
          background-size: contain;
}


        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
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

        marquee {

            padding: 5px;
            font-weight: bold;
            color: black;
        }
    .right-side.multiple-cards {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px; /* Controls spacing between cards */
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
            <strong>Id: <?php echo $_SESSION['id']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <li class="nav-item">
   
   
</li>
            <ul class="navbar-nav align-items-center">
                <!-- Search Icon -->
        <li class="nav-item">
            
        </li>
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

    <!-- Marquee -->
    <marquee>Department Library Automation. Library opens at 8:00 AM and closes at 8:00 PM</marquee>

    <!-- Main Section -->
    <div class="main-container">
    <div class="left-side"></div>

    <!-- Combined right-side -->

    <div class="right-side multiple-cards">
        <div class="card bg-light">
            <div class="card-header text-center">
                E-Content
            </div>
            <div class="card-body text-center">
                <a href="regbooks.php" class="btn btn-outline-primary">View E-Books</a>
            </div>
        </div>

        <div class="card bg-light">
            <div class="card-header text-center">
                View Department Books
            </div>
            <div class="card-body text-center">
                <a href="deptbooks.php" class="btn btn-outline-primary">View Department Books</a>
            </div>
        </div>
    </div>
</div>


</body>
</html>
