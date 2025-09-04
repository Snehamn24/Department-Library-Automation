<?php
    session_start();
    $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $name="";
              $uucms="";
              $email="";
              $mobile="";
              $address="";
              $query = "SELECT * FROM student WHERE email = '$_SESSION[email]'";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){ 
                $name=$row['name'];
                $uucms=$row['uucms'];
                $email=$row['email'];
                $mobile=$row['mobile'];
                $address=$row['address'];
            }
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

   <style>
    html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #d6e6f8 50%, #d6e6f8 50%);
            /*background :rgba(216, 236, 247);*/
        }

        .navbar {
            background-color: #3a6ea5 !important;
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
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form>
                <div class="form-group mb-3">
                    <label>Name:</label>
                    <input type="text" class="form-control" value="<?php echo $name;?>" disabled> 
                </div>
                 <div class="form-group mb-3">
                    <label>UUCMS-ID:</label>
                    <input type="text" class="form-control" value="<?php echo $uucms;?>" disabled> 
                </div>

                <div class="form-group mb-3">
                    <label>Email:</label>
                    <input type="text" class="form-control" value="<?php echo $email;?>" disabled> 
                </div>
                <div class="form-group mb-3">
                    <label>Mobile:</label>
                    <input type="text" class="form-control" value="<?php echo $mobile;?>" disabled> 
                </div>
                <div class="form-group mb-3">
                    <label>Address:</label>
                  <textarea rows="3" cols="40" disabled="" class="form-control"><?php echo $address;?></textarea>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>
